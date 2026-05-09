<section class="page-hero">
    <p class="eyebrow">Actualites</p>
    <h1>Ressources formation et certification</h1>
    <p>Une base SEO simple pour publier des conseils utiles et des informations sur les parcours ARCS.</p>
</section>

<section class="section">
    <div class="cards three">
        <?php foreach (site_data('articles') as $article): ?>
            <article class="card">
                <span class="tag"><?= e($article['date']) ?></span>
                <h2><?= e($article['title']) ?></h2>
                <p><?= e($article['excerpt']) ?></p>
                <a class="card-link" href="/actualites/<?= e($article['slug']) ?>">Lire</a>
            </article>
        <?php endforeach; ?>
    </div>
</section>
