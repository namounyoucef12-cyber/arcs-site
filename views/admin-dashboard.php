<section class="admin-page">
    <div class="admin-heading">
        <div>
            <p class="eyebrow">Admin</p>
            <h1>Tableau de bord</h1>
        </div>
        <a class="btn btn-ghost" href="/admin/logout">Deconnexion</a>
    </div>

    <div class="cards four">
        <article class="metric"><strong><?= count($contacts) ?></strong><span>Contacts</span></article>
        <article class="metric"><strong><?= count($quotes) ?></strong><span>Devis</span></article>
        <article class="metric"><strong><?= count($reservations) ?></strong><span>Reservations</span></article>
        <article class="metric"><strong><?= count(site_data('formations')) ?></strong><span>Formations</span></article>
    </div>

    <div class="admin-columns">
        <section class="admin-panel">
            <h2>Reservations</h2>
            <?php partial('record-list', ['records' => $reservations]); ?>
        </section>
        <section class="admin-panel">
            <h2>Demandes de devis</h2>
            <?php partial('record-list', ['records' => $quotes]); ?>
        </section>
        <section class="admin-panel">
            <h2>Contacts</h2>
            <?php partial('record-list', ['records' => $contacts]); ?>
        </section>
    </div>
</section>
