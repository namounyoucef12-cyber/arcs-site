<?php
$formationVisuals = [
    'Francais' => 'formation-linguistique.jpg',
    'Anglais' => 'formation-entreprise.jpg',
    'Examens' => 'certificat-qualiopi.jpg',
];
?>
<section class="hero">
    <div class="hero-inner">
        <div class="hero-copy">
            <p class="eyebrow">Centre de formation linguistique et certifications</p>
            <h1>Developpez vos competences, certifiez vos talents.</h1>
            <p class="lead">ARCS accompagne les particuliers, salaries, demandeurs d emploi et entreprises dans des parcours de langues utiles, mesurables et certifiants.</p>
            <div class="hero-actions">
                <a class="btn btn-primary" href="/formations">Decouvrir les formations</a>
                <a class="btn btn-secondary" href="/examens">Reserver un examen</a>
                <a class="btn btn-ghost" href="/contact">Demander un devis</a>
            </div>
        </div>
        <figure class="hero-media" aria-label="Diplomes et certification ARCS">
            <img src="/assets/img/hero-diplomes.jpg" alt="Diplomes leves devant un batiment universitaire">
            <figcaption>
                <strong>Formations, examens, financement</strong>
                <span>Un accompagnement clair de l analyse du besoin jusqu a la certification.</span>
            </figcaption>
        </figure>
    </div>
</section>

<section class="trust-band" aria-label="Reperes ARCS">
    <span>Qualiopi</span>
    <span>CPF / OPCO</span>
    <span>Francais professionnel</span>
    <span>TEF et certifications</span>
    <span>Parcours entreprises</span>
</section>

<section class="section about-preview">
    <figure class="section-media">
        <img src="/assets/img/formation-linguistique.jpg" alt="Formatrice animant une seance de formation linguistique">
        <figcaption><strong>97%</strong><span>Taux de reussite communique sur l ancien site</span></figcaption>
    </figure>
    <div class="section-copy">
        <p class="eyebrow">Nous sommes ARCS</p>
        <h2>Un cadre pedagogique serieux, humain et oriente resultats</h2>
        <p>ARCS met l accent sur le francais langue etrangere, le francais professionnel et les langues en contexte de travail. Chaque parcours part d un positionnement, d un objectif concret et d une progression lisible.</p>
        <div class="stats-grid" aria-label="Chiffres cles">
            <div><strong>97%</strong><span>Taux de reussite</span></div>
            <div><strong>98%</strong><span>Satisfaction</span></div>
            <div><strong>694</strong><span>Apprenants</span></div>
        </div>
    </div>
</section>

<section class="section">
    <div class="section-heading">
        <div>
            <p class="eyebrow">Formations</p>
            <h2>Des parcours presentes comme une vraie offre de formation</h2>
        </div>
        <a href="/formations">Voir toutes les formations</a>
    </div>
    <div class="cards three training-grid">
        <?php foreach (array_slice(site_data('formations'), 0, 3) as $formation): ?>
            <?php $visual = $formationVisuals[$formation['category']] ?? 'formation-linguistique.jpg'; ?>
            <article class="card training-card">
                <img class="card-media" src="/assets/img/<?= e($visual) ?>" alt="">
                <div class="card-body">
                    <span class="tag"><?= e($formation['category']) ?></span>
                    <h3><?= e($formation['title']) ?></h3>
                    <p><?= e($formation['summary']) ?></p>
                    <dl class="meta-list">
                        <div><dt>Duree</dt><dd><?= e($formation['duration']) ?></dd></div>
                        <div><dt>Niveau</dt><dd><?= e($formation['level']) ?></dd></div>
                    </dl>
                    <a class="card-link" href="/formations/<?= e($formation['slug']) ?>">Consulter</a>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
</section>

<section class="section partner-section">
    <div class="section-heading">
        <div>
            <p class="eyebrow">Certifications et partenariats</p>
            <h2>Des reperes visibles pour rassurer les candidats et les entreprises</h2>
        </div>
    </div>
    <div class="partner-grid">
        <img src="/assets/img/logo-qualiopi.png" alt="Qualiopi">
        <img src="/assets/img/logo-cci.png" alt="CCI Paris Ile-de-France">
        <img src="/assets/img/logo-toeic.png" alt="TOEIC centre agree">
        <img src="/assets/img/logo-leveltel.png" alt="Leveltel">
        <img src="/assets/img/logo-cpf.jpg" alt="Mon Compte Formation">
        <img src="/assets/img/logo-opco.jpg" alt="OPCO">
    </div>
</section>

<section class="split-section certification-section">
    <div>
        <p class="eyebrow">Examens et certifications</p>
        <h2>Pre-reserver une session TEF dans un parcours clair</h2>
        <p>Le site garde le parcours de reservation : choix de session, informations candidat, besoin particulier, statut de reservation et paiement a connecter.</p>
        <a class="btn btn-primary" href="/examens">Ouvrir la reservation</a>
    </div>
    <div class="process">
        <div><span>1</span> Choix de l examen</div>
        <div><span>2</span> Informations candidat</div>
        <div><span>3</span> Validation et statut</div>
    </div>
</section>

<section class="section compact contact-panel">
    <div class="section-heading">
        <div>
            <p class="eyebrow">Contact rapide</p>
            <h2>Parlez-nous de votre besoin</h2>
        </div>
    </div>
    <?php partial('contact-form'); ?>
</section>
