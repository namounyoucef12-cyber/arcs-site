<?php
declare(strict_types=1);

return [
    // Copy this file to config.local.php on the server and change these values.
    'admin_email' => 'contact@example.com',
    'admin_password_hash' => password_hash('change-this-password', PASSWORD_DEFAULT),
    'site_url' => 'https://dev.arcs-france.fr',
    'mail_from' => 'no-reply@example.com',
    'mail_enabled' => false,
];
