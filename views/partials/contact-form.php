<form class="form async-form" method="post" action="/api/contact">
    <input type="hidden" name="csrf_token" value="<?= e(csrf_token()) ?>">
    <input class="hidden-field" type="text" name="website" autocomplete="off" tabindex="-1">
    <div class="form-grid">
        <label>Prenom
            <input name="first_name" autocomplete="given-name" required>
        </label>
        <label>Nom
            <input name="last_name" autocomplete="family-name" required>
        </label>
    </div>
    <div class="form-grid">
        <label>E-mail
            <input type="email" name="email" autocomplete="email" required>
        </label>
        <label>Telephone
            <input name="phone" autocomplete="tel">
        </label>
    </div>
    <label>Sujet
        <select name="subject" required>
            <option value="">Choisir un sujet</option>
            <option>Formation</option>
            <option>Reservation examen</option>
            <option>Financement</option>
            <option>Entreprise</option>
            <option>Autre demande</option>
        </select>
    </label>
    <label>Message
        <textarea name="message" rows="5" required></textarea>
    </label>
    <label class="checkbox">
        <input type="checkbox" name="consent" value="1" required>
        <span>J accepte que mes informations soient utilisees pour traiter ma demande.</span>
    </label>
    <button class="btn btn-primary" type="submit">Envoyer la demande</button>
    <p class="form-status" role="status"></p>
</form>
