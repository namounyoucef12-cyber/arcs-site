<?php
declare(strict_types=1);

$path = rtrim(parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/', '/') ?: '/admin';

if ($path === '/admin/logout') {
    unset($_SESSION['admin_authenticated']);
    header('Location: /admin/login');
    exit;
}

if ($path === '/admin/login' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    verify_csrf();
    $password = (string) ($_POST['password'] ?? '');
    $hash = (string) config_value('admin_password_hash');

    if (password_verify($password, $hash)) {
        session_regenerate_id(true);
        $_SESSION['admin_authenticated'] = true;
        header('Location: /admin');
        exit;
    }

    render('admin-login', [
        'title' => 'Connexion admin | ARCS',
        'description' => 'Connexion administration ARCS.',
        'error' => 'Mot de passe incorrect.',
    ]);
    exit;
}

if ($path === '/admin/login') {
    render('admin-login', [
        'title' => 'Connexion admin | ARCS',
        'description' => 'Connexion administration ARCS.',
    ]);
    exit;
}

require_admin();

$contacts = read_records('contacts');
$quotes = read_records('quotes');
$reservations = read_records('reservations');

render('admin-dashboard', [
    'title' => 'Administration | ARCS',
    'description' => 'Tableau de bord administration ARCS.',
    'contacts' => $contacts,
    'quotes' => $quotes,
    'reservations' => $reservations,
]);
