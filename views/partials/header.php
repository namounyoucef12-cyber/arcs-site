<?php
$contact = site_data('contact');
$nav = [
    '/formations' => 'Formations',
    '/examens' => 'Examens',
    '/financements' => 'Financements',
    '/entreprises' => 'Entreprises',
    '/a-propos' => 'A propos',
    '/contact' => 'Contact',
];
?>
<header class="site-header">
    <a class="skip-link" href="#contenu">Aller au contenu</a>
    <div class="header-top" aria-label="Informations rapides">
        <div class="header-top-inner">
            <span>Centre de formation linguistique et certifications</span>
            <span><?= e($contact['address'] ?? 'Paris') ?></span>
        </div>
    </div>
    <div class="header-inner">
        <a class="brand" href="/" aria-label="ARCS accueil">
            <img class="brand-logo" src="/assets/img/logo-arcs.png" alt="ARCS">
            <span>
                <strong>ARCS</strong>
                <small>Competences, langues & certifications</small>
            </span>
        </a>
        <button class="nav-toggle" type="button" aria-expanded="false" aria-controls="navigation" aria-label="Ouvrir le menu">
            <span></span>
            <span></span>
            <span></span>
        </button>
        <nav id="navigation" class="main-nav" aria-label="Navigation principale">
            <?php foreach ($nav as $path => $label): ?>
                <a class="<?= is_active($path) ? 'active' : '' ?>" href="<?= e($path) ?>"><?= e($label) ?></a>
            <?php endforeach; ?>
        </nav>
        <div class="header-actions">
            <a class="btn btn-ghost" href="/contact">Devis</a>
            <a class="btn btn-primary" href="/examens">Reserver</a>
        </div>
    </div>
</header>
