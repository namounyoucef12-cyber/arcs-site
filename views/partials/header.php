<?php
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
    <div class="header-inner">
        <a class="brand" href="/" aria-label="ARCS accueil">
            <span class="brand-mark">A</span>
            <span>
                <strong>ARCS</strong>
                <small>Competences & certifications</small>
            </span>
        </a>
        <button class="nav-toggle" type="button" aria-expanded="false" aria-controls="navigation">Menu</button>
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
