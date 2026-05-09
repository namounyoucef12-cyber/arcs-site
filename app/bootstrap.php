<?php
declare(strict_types=1);

session_start();

const APP_ROOT = __DIR__ . '/..';
const STORAGE_DIR = APP_ROOT . '/storage';

if (!is_dir(STORAGE_DIR)) {
    mkdir(STORAGE_DIR, 0755, true);
}

$defaultConfig = [
    'admin_email' => 'admin@example.com',
    'admin_password_hash' => '$2y$10$replace.this.hash.on.server',
    'site_url' => 'https://dev.arcs-france.fr',
    'mail_from' => 'no-reply@example.com',
    'mail_enabled' => false,
];

$localConfig = is_file(APP_ROOT . '/config.local.php')
    ? require APP_ROOT . '/config.local.php'
    : [];

$GLOBALS['config'] = array_replace($defaultConfig, is_array($localConfig) ? $localConfig : []);
$GLOBALS['data'] = require __DIR__ . '/data.php';

function config_value(string $key, mixed $fallback = null): mixed
{
    return $GLOBALS['config'][$key] ?? $fallback;
}

function site_data(string $key): mixed
{
    return $GLOBALS['data'][$key] ?? null;
}

function e(mixed $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

function url(string $path): string
{
    return $path === '/' ? '/' : '/' . ltrim($path, '/');
}

function is_active(string $path): bool
{
    $current = rtrim(parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/', '/') ?: '/';
    return $current === $path;
}

function csrf_token(): string
{
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }

    return $_SESSION['csrf_token'];
}

function verify_csrf(): void
{
    $token = $_POST['csrf_token'] ?? '';
    if (!is_string($token) || !hash_equals($_SESSION['csrf_token'] ?? '', $token)) {
        json_response(['ok' => false, 'message' => 'Session expiree. Rechargez la page.'], 419);
    }
}

function json_response(array $payload, int $status = 200): never
{
    http_response_code($status);
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($payload, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    exit;
}

function render(string $view, array $params = []): void
{
    $title = $params['title'] ?? 'ARCS';
    $description = $params['description'] ?? 'ARCS accompagne particuliers, salaries, demandeurs d emploi et entreprises dans le developpement des competences linguistiques.';
    $viewFile = __DIR__ . '/../views/' . $view . '.php';

    if (!is_file($viewFile)) {
        throw new RuntimeException('Vue introuvable: ' . $view);
    }

    extract($params, EXTR_SKIP);
    require __DIR__ . '/../views/layout.php';
}

function partial(string $name, array $params = []): void
{
    extract($params, EXTR_SKIP);
    require __DIR__ . '/../views/partials/' . $name . '.php';
}

function find_formation(string $slug): ?array
{
    foreach (site_data('formations') as $formation) {
        if ($formation['slug'] === $slug) {
            return $formation;
        }
    }

    return null;
}

function find_article(string $slug): ?array
{
    foreach (site_data('articles') as $article) {
        if ($article['slug'] === $slug) {
            return $article;
        }
    }

    return null;
}

function store_record(string $type, array $record): array
{
    $allowed = ['contacts', 'quotes', 'reservations'];
    if (!in_array($type, $allowed, true)) {
        throw new InvalidArgumentException('Type de stockage invalide.');
    }

    $record['id'] = strtoupper(substr($type, 0, 3)) . '-' . date('Ymd-His') . '-' . random_int(100, 999);
    $record['created_at'] = date(DATE_ATOM);
    $record['ip_hash'] = hash('sha256', $_SERVER['REMOTE_ADDR'] ?? 'unknown');
    $file = STORAGE_DIR . '/' . $type . '.jsonl';
    file_put_contents($file, json_encode($record, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . PHP_EOL, FILE_APPEND | LOCK_EX);

    return $record;
}

function read_records(string $type): array
{
    $file = STORAGE_DIR . '/' . $type . '.jsonl';
    if (!is_file($file)) {
        return [];
    }

    $records = [];
    foreach (file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) ?: [] as $line) {
        $decoded = json_decode($line, true);
        if (is_array($decoded)) {
            $records[] = $decoded;
        }
    }

    return array_reverse($records);
}

function require_admin(): void
{
    if (empty($_SESSION['admin_authenticated'])) {
        header('Location: /admin/login');
        exit;
    }
}

function send_notification(string $subject, string $body): void
{
    if (!config_value('mail_enabled', false)) {
        return;
    }

    $to = config_value('admin_email');
    $from = config_value('mail_from');
    $headers = [
        'From: ARCS <' . $from . '>',
        'Reply-To: ' . $from,
        'Content-Type: text/plain; charset=UTF-8',
    ];

    @mail((string) $to, $subject, $body, implode("\r\n", $headers));
}
