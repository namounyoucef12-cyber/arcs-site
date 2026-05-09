<section class="page-hero">
    <p class="eyebrow"><?= e($article['date']) ?></p>
    <h1><?= e($article['title']) ?></h1>
    <p><?= e($article['excerpt']) ?></p>
</section>

<article class="detail-content standalone">
    <?php foreach ($article['content'] as $paragraph): ?>
        <p><?= e($paragraph) ?></p>
    <?php endforeach; ?>
</article>
