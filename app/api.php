<?php
declare(strict_types=1);

$path = rtrim(parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/', '/');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    json_response(['ok' => false, 'message' => 'Methode non autorisee.'], 405);
}

verify_csrf();

$honeypot = trim((string) ($_POST['website'] ?? ''));
if ($honeypot !== '') {
    json_response(['ok' => true, 'message' => 'Merci, votre demande a ete transmise.']);
}

if ($path === '/api/contact') {
    $record = validate_contact($_POST);
    store_record('contacts', $record);
    send_notification('Nouvelle demande contact ARCS', build_message($record));
    json_response(['ok' => true, 'message' => 'Votre message a bien ete envoye.']);
}

if ($path === '/api/quote') {
    $record = validate_quote($_POST);
    store_record('quotes', $record);
    send_notification('Nouvelle demande de devis ARCS', build_message($record));
    json_response(['ok' => true, 'message' => 'Votre demande de devis a bien ete enregistree.']);
}

if ($path === '/api/reservation') {
    $record = validate_reservation($_POST);
    store_record('reservations', $record);
    send_notification('Nouvelle reservation examen ARCS', build_message($record));
    json_response(['ok' => true, 'message' => 'Votre demande de reservation a bien ete enregistree.']);
}

json_response(['ok' => false, 'message' => 'Endpoint introuvable.'], 404);

function clean_string(array $source, string $key, int $max = 300): string
{
    $value = trim((string) ($source[$key] ?? ''));
    $value = preg_replace('/\s+/', ' ', $value) ?: '';
    return function_exists('mb_substr') ? mb_substr($value, 0, $max) : substr($value, 0, $max);
}

function require_field(array $source, string $key, string $label, int $max = 300): string
{
    $value = clean_string($source, $key, $max);
    if ($value === '') {
        json_response(['ok' => false, 'message' => $label . ' est obligatoire.'], 422);
    }

    return $value;
}

function validate_email_field(array $source): string
{
    $email = require_field($source, 'email', 'L email', 180);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        json_response(['ok' => false, 'message' => 'Adresse e-mail invalide.'], 422);
    }

    return $email;
}

function require_consent(array $source): void
{
    if (($source['consent'] ?? '') !== '1') {
        json_response(['ok' => false, 'message' => 'Le consentement RGPD est obligatoire.'], 422);
    }
}

function validate_contact(array $source): array
{
    require_consent($source);

    return [
        'type' => 'contact',
        'status' => 'nouveau',
        'first_name' => require_field($source, 'first_name', 'Le prenom', 80),
        'last_name' => require_field($source, 'last_name', 'Le nom', 80),
        'email' => validate_email_field($source),
        'phone' => clean_string($source, 'phone', 40),
        'subject' => require_field($source, 'subject', 'Le sujet', 160),
        'message' => require_field($source, 'message', 'Le message', 2000),
    ];
}

function validate_quote(array $source): array
{
    require_consent($source);

    return [
        'type' => 'quote',
        'status' => 'nouveau',
        'first_name' => require_field($source, 'first_name', 'Le prenom', 80),
        'last_name' => require_field($source, 'last_name', 'Le nom', 80),
        'email' => validate_email_field($source),
        'phone' => require_field($source, 'phone', 'Le telephone', 40),
        'profile' => require_field($source, 'profile', 'Le profil', 120),
        'formation' => require_field($source, 'formation', 'La formation', 160),
        'funding' => clean_string($source, 'funding', 160),
        'message' => clean_string($source, 'message', 2000),
    ];
}

function validate_reservation(array $source): array
{
    require_consent($source);

    return [
        'type' => 'reservation',
        'status' => 'en_attente_paiement',
        'exam' => require_field($source, 'exam', 'L examen', 120),
        'session' => require_field($source, 'session', 'La session', 160),
        'first_name' => require_field($source, 'first_name', 'Le prenom', 80),
        'last_name' => require_field($source, 'last_name', 'Le nom', 80),
        'birth_date' => require_field($source, 'birth_date', 'La date de naissance', 30),
        'email' => validate_email_field($source),
        'phone' => require_field($source, 'phone', 'Le telephone', 40),
        'accessibility' => clean_string($source, 'accessibility', 800),
        'payment_status' => 'a_connecter',
    ];
}

function build_message(array $record): string
{
    $lines = [];
    foreach ($record as $key => $value) {
        $lines[] = $key . ': ' . (is_scalar($value) ? (string) $value : json_encode($value));
    }

    return implode("\n", $lines);
}
