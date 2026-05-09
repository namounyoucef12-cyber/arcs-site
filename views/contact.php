<section class="page-hero">
    <p class="eyebrow">Contact</p>
    <h1>Nous contacter</h1>
    <p>Formation, financement, reservation d examen ou demande entreprise : laissez-nous les informations utiles.</p>
</section>

<section class="split-section align-start">
    <div class="info-panel">
        <h2>Coordonnees</h2>
        <dl class="meta-list vertical">
            <div><dt>Adresse</dt><dd><?= e(site_data('contact')['address']) ?></dd></div>
            <div><dt>Telephone</dt><dd><?= e(site_data('contact')['phone']) ?></dd></div>
            <div><dt>E-mail</dt><dd><?= e(site_data('contact')['email']) ?></dd></div>
            <div><dt>Horaires</dt><dd><?= e(site_data('contact')['hours']) ?></dd></div>
        </dl>
    </div>
    <?php partial('contact-form'); ?>
</section>
