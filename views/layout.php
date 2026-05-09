<?php
$contact = site_data('contact');
$canonical = rtrim((string) config_value('site_url'), '/') . (parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/');
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($title) ?></title>
    <meta name="description" content="<?= e($description) ?>">
    <link rel="canonical" href="<?= e($canonical) ?>">
    <meta property="og:title" content="<?= e($title) ?>">
    <meta property="og:description" content="<?= e($description) ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= e($canonical) ?>">
    <meta name="theme-color" content="#161357">
    <link rel="stylesheet" href="/assets/css/styles.css">
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "EducationalOrganization",
      "name": "ARCS",
      "alternateName": "Academie de Renforcement des Competences et du Savoir",
      "url": "<?= e(rtrim((string) config_value('site_url'), '/')) ?>",
      "telephone": "<?= e(site_data('contact')['phone'] ?? '') ?>",
      "email": "<?= e(site_data('contact')['email'] ?? '') ?>",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "28 rue de Londres",
        "postalCode": "75009",
        "addressLocality": "Paris",
        "addressCountry": "FR"
      }
    }
    </script>
</head>
<body>
    <?php partial('header'); ?>
    <main id="contenu">
        <?php require $viewFile; ?>
    </main>
    <?php partial('footer', ['contact' => $contact]); ?>
    <script src="/assets/js/app.js" defer></script>
</body>
</html>
