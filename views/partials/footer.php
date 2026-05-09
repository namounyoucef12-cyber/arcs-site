<footer class="site-footer">
    <div class="footer-grid">
        <section class="footer-brand">
            <img src="/assets/img/logo-arcs.png" alt="ARCS">
            <p>Academie de Renforcement des Competences et du Savoir. Formations linguistiques, certifications et accompagnement professionnel.</p>
            <div class="footer-badges">
                <span>CPF / OPCO</span>
                <span>Certifications</span>
            </div>
        </section>
        <section>
            <h2>Contact</h2>
            <p><?= e($contact['address'] ?? '') ?></p>
            <p><?= e($contact['hours'] ?? '') ?></p>
            <p><?= e($contact['email'] ?? 'E-mail a completer') ?></p>
            <p><?= e($contact['phone'] ?? 'Telephone a completer') ?></p>
        </section>
        <section>
            <h2>Acces rapide</h2>
            <a href="/">Accueil</a>
            <a href="/formations">Formations</a>
            <a href="/examens">Reservation examen</a>
            <a href="/financements">Financements</a>
            <a href="/contact">Contact</a>
        </section>
        <section>
            <h2>Documents</h2>
            <a href="/reglement-interieur">Reglement interieur</a>
            <a href="/mentions-legales">Mentions legales</a>
            <a href="/politique-confidentialite">Confidentialite</a>
            <span>Brochure et certificat Qualiopi a ajouter</span>
        </section>
    </div>
    <div class="footer-bottom">
        <span>&copy; <?= date('Y') ?> ARCS. Tous droits reserves.</span>
        <a href="/admin">Administration</a>
    </div>
</footer>
