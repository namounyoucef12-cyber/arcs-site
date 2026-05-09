<section class="page-hero">
    <p class="eyebrow">Catalogue</p>
    <h1>Formations linguistiques</h1>
    <p>Des parcours clairs pour progresser, certifier un niveau et structurer un projet professionnel.</p>
</section>

<section class="section">
    <div class="filters" aria-label="Filtres formations">
        <button class="filter-button active" type="button" data-filter="all">Toutes</button>
        <button class="filter-button" type="button" data-filter="Francais">Francais</button>
        <button class="filter-button" type="button" data-filter="Anglais">Anglais</button>
        <button class="filter-button" type="button" data-filter="Examens">Examens</button>
    </div>
    <div class="cards three filter-list">
        <?php foreach (site_data('formations') as $formation): ?>
            <article class="card formation-card" data-category="<?= e($formation['category']) ?>">
                <span class="tag"><?= e($formation['category']) ?></span>
                <h2><?= e($formation['title']) ?></h2>
                <p><?= e($formation['summary']) ?></p>
                <dl class="meta-list">
                    <div><dt>Duree</dt><dd><?= e($formation['duration']) ?></dd></div>
                    <div><dt>Tarif</dt><dd><?= e($formation['price']) ?></dd></div>
                    <div><dt>Certification</dt><dd><?= e($formation['certification']) ?></dd></div>
                </dl>
                <a class="card-link" href="/formations/<?= e($formation['slug']) ?>">Voir le programme</a>
            </article>
        <?php endforeach; ?>
    </div>
</section>
