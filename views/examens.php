<section class="page-hero">
    <p class="eyebrow">Certifications</p>
    <h1>Examens et reservations</h1>
    <p>Pre-reservez une session TEF ou demandez un accompagnement certification. Le paiement en ligne sera connecte apres validation du prestataire.</p>
</section>

<section class="split-section">
    <div>
        <h2>TEF</h2>
        <p>Le TEF est mis en avant comme parcours prioritaire. Les dates, tarifs definitifs et conditions officielles seront confirmes dans l espace d administration avant ouverture publique complete.</p>
        <ul class="check-list">
            <li>Collecte des informations candidat.</li>
            <li>Gestion des besoins particuliers.</li>
            <li>Statuts : brouillon, attente paiement, payee, confirmee, annulee.</li>
            <li>Historique visible dans l administration.</li>
        </ul>
    </div>
    <aside class="info-panel">
        <h2>Sessions</h2>
        <?php foreach (site_data('exam_sessions') as $session): ?>
            <div class="session-row">
                <strong><?= e($session['exam']) ?></strong>
                <span><?= e($session['date']) ?>, <?= e($session['time']) ?></span>
                <small><?= e($session['location']) ?></small>
            </div>
        <?php endforeach; ?>
    </aside>
</section>

<section class="section compact">
    <div class="section-heading">
        <p class="eyebrow">Reservation</p>
        <h2>Pre-reserver un examen</h2>
    </div>
    <?php partial('reservation-form'); ?>
</section>
