<?php
declare(strict_types=1);

require __DIR__ . '/app/bootstrap.php';

$path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
$path = rtrim($path, '/') ?: '/';

if (str_starts_with($path, '/api/')) {
    require __DIR__ . '/app/api.php';
    exit;
}

if (str_starts_with($path, '/admin')) {
    require __DIR__ . '/app/admin.php';
    exit;
}

$routes = require __DIR__ . '/app/routes.php';
$route = $routes[$path] ?? null;

if ($route === null && str_starts_with($path, '/formations/')) {
    $slug = trim(substr($path, strlen('/formations/')), '/');
    $formation = find_formation($slug);
    if ($formation) {
        render('formation-detail', [
            'title' => $formation['title'] . ' | ARCS',
            'description' => $formation['summary'],
            'formation' => $formation,
        ]);
        exit;
    }
}

if ($route === null && str_starts_with($path, '/actualites/')) {
    $slug = trim(substr($path, strlen('/actualites/')), '/');
    $article = find_article($slug);
    if ($article) {
        render('article-detail', [
            'title' => $article['title'] . ' | ARCS',
            'description' => $article['excerpt'],
            'article' => $article,
        ]);
        exit;
    }
}

if ($route === null) {
    http_response_code(404);
    render('404', [
        'title' => 'Page introuvable | ARCS',
        'description' => 'La page demandee est introuvable.',
    ]);
    exit;
}

render($route['view'], [
    'title' => $route['title'],
    'description' => $route['description'],
]);
