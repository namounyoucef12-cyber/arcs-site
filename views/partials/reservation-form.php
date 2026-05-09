<form class="form async-form reservation-form" method="post" action="/api/reservation">
    <input type="hidden" name="csrf_token" value="<?= e(csrf_token()) ?>">
    <input class="hidden-field" type="text" name="website" autocomplete="off" tabindex="-1">
    <div class="step-grid">
        <section class="step">
            <span>1</span>
            <h3>Examen</h3>
            <label>Examen souhaite
                <select name="exam" required>
                    <option>TEF</option>
                    <option>Preparation certification</option>
                    <option>Autre examen a confirmer</option>
                </select>
            </label>
            <label>Session
                <select name="session" required>
                    <?php foreach (site_data('exam_sessions') as $session): ?>
                        <option><?= e($session['exam'] . ' - ' . $session['date'] . ' - ' . $session['location']) ?></option>
                    <?php endforeach; ?>
                </select>
            </label>
        </section>
        <section class="step">
            <span>2</span>
            <h3>Candidat</h3>
            <div class="form-grid">
                <label>Prenom
                    <input name="first_name" required>
                </label>
                <label>Nom
                    <input name="last_name" required>
                </label>
            </div>
            <label>Date de naissance
                <input type="date" name="birth_date" required>
            </label>
        </section>
        <section class="step">
            <span>3</span>
            <h3>Coordonnees</h3>
            <div class="form-grid">
                <label>E-mail
                    <input type="email" name="email" required>
                </label>
                <label>Telephone
                    <input name="phone" required>
                </label>
            </div>
            <label>Besoin particulier ou accessibilite
                <textarea name="accessibility" rows="3"></textarea>
            </label>
        </section>
    </div>
    <div class="notice">
        Le paiement en ligne sera connecte apres choix du prestataire. Cette demande cree une reservation avec statut en attente de paiement.
    </div>
    <label class="checkbox">
        <input type="checkbox" name="consent" value="1" required>
        <span>J accepte le traitement de ma demande et je reconnais que le reglement officiel sera transmis avant confirmation definitive.</span>
    </label>
    <button class="btn btn-primary" type="submit">Pre-reserver l examen</button>
    <p class="form-status" role="status"></p>
</form>
