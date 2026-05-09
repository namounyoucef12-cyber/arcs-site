<section class="page-hero">
    <p class="eyebrow"><?= e($formation['category']) ?></p>
    <h1><?= e($formation['title']) ?></h1>
    <p><?= e($formation['summary']) ?></p>
    <div class="hero-actions">
        <a class="btn btn-primary" href="#devis">Demander un devis</a>
        <a class="btn btn-ghost" href="/contact">Nous contacter</a>
    </div>
</section>

<section class="detail-layout">
    <article class="detail-content">
        <h2>Objectifs</h2>
        <ul class="check-list">
            <?php foreach ($formation['objectives'] as $item): ?>
                <li><?= e($item) ?></li>
            <?php endforeach; ?>
        </ul>

        <h2>Programme</h2>
        <ul class="program-list">
            <?php foreach ($formation['program'] as $item): ?>
                <li><?= e($item) ?></li>
            <?php endforeach; ?>
        </ul>

        <h2>Public et pre-requis</h2>
        <p><?= e($formation['audience']) ?></p>
        <p><?= e($formation['requirements']) ?></p>

        <h2>Modalites et accessibilite</h2>
        <p><?= e($formation['access']) ?></p>
        <p><?= e($formation['accessibility']) ?></p>
    </article>
    <aside class="info-panel">
        <h2>Informations cles</h2>
        <dl class="meta-list vertical">
            <div><dt>Duree</dt><dd><?= e($formation['duration']) ?></dd></div>
            <div><dt>Niveau</dt><dd><?= e($formation['level']) ?></dd></div>
            <div><dt>Tarif</dt><dd><?= e($formation['price']) ?></dd></div>
            <div><dt>Certification</dt><dd><?= e($formation['certification']) ?></dd></div>
            <div><dt>Lieu</dt><dd><?= e($formation['location']) ?></dd></div>
            <div><dt>Format</dt><dd><?= e($formation['format']) ?></dd></div>
            <div><dt>Financement</dt><dd><?= e($formation['funding']) ?></dd></div>
        </dl>
    </aside>
</section>

<section id="devis" class="section compact">
    <div class="section-heading">
        <p class="eyebrow">Devis</p>
        <h2>Recevoir une proposition</h2>
    </div>
    <?php partial('quote-form'); ?>
</section>
