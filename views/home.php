<section class="hero">
    <div class="hero-content">
        <p class="eyebrow">Centre de formation linguistique et certifications</p>
        <h1>ARCS</h1>
        <p class="lead">Developpez vos competences, certifiez vos talents.</p>
        <p>ARCS accompagne particuliers, salaries, demandeurs d emploi et entreprises dans les parcours linguistiques, la preparation aux certifications et la reservation d examens.</p>
        <div class="hero-actions">
            <a class="btn btn-primary" href="/formations">Decouvrir les formations</a>
            <a class="btn btn-secondary" href="/examens">Reserver un examen</a>
            <a class="btn btn-ghost" href="/contact">Demander un devis</a>
        </div>
    </div>
    <aside class="hero-panel" aria-label="Informations cles">
        <div>
            <strong>Francais professionnel</strong>
            <span>50 heures, A2+ a C1, certification LEVELTEL</span>
        </div>
        <div>
            <strong>Examens</strong>
            <span>Parcours de reservation TEF pret a connecter au paiement</span>
        </div>
        <div>
            <strong>Financement</strong>
            <span>CPF, OPCO, entreprise ou financement personnel</span>
        </div>
    </aside>
</section>

<section class="trust-band">
    <span>Qualiopi a verifier</span>
    <span>CPF / OPCO</span>
    <span>Formations langues</span>
    <span>Certifications</span>
    <span>Entreprises</span>
</section>

<section class="section">
    <div class="section-heading">
        <p class="eyebrow">Formations</p>
        <h2>Des parcours lisibles et orientes objectifs</h2>
        <a href="/formations">Voir toutes les formations</a>
    </div>
    <div class="cards three">
        <?php foreach (array_slice(site_data('formations'), 0, 3) as $formation): ?>
            <article class="card">
                <span class="tag"><?= e($formation['category']) ?></span>
                <h3><?= e($formation['title']) ?></h3>
                <p><?= e($formation['summary']) ?></p>
                <dl class="meta-list">
                    <div><dt>Duree</dt><dd><?= e($formation['duration']) ?></dd></div>
                    <div><dt>Niveau</dt><dd><?= e($formation['level']) ?></dd></div>
                </dl>
                <a class="card-link" href="/formations/<?= e($formation['slug']) ?>">Consulter</a>
            </article>
        <?php endforeach; ?>
    </div>
</section>

<section class="split-section">
    <div>
        <p class="eyebrow">Examens et certifications</p>
        <h2>Pre-reserver une session TEF</h2>
        <p>Le nouveau site prepare deja le parcours : choix de session, informations candidat, besoin particulier, statut de reservation et paiement a connecter.</p>
        <a class="btn btn-primary" href="/examens">Ouvrir la reservation</a>
    </div>
    <div class="process">
        <div><span>1</span> Choix de l examen</div>
        <div><span>2</span> Informations candidat</div>
        <div><span>3</span> Validation et statut</div>
    </div>
</section>

<section class="section compact">
    <div class="section-heading">
        <p class="eyebrow">Contact rapide</p>
        <h2>Parlez-nous de votre besoin</h2>
    </div>
    <?php partial('contact-form'); ?>
</section>
