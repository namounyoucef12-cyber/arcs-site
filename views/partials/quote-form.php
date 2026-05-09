<form class="form async-form" method="post" action="/api/quote">
    <input type="hidden" name="csrf_token" value="<?= e(csrf_token()) ?>">
    <input class="hidden-field" type="text" name="website" autocomplete="off" tabindex="-1">
    <div class="form-grid">
        <label>Prenom
            <input name="first_name" required>
        </label>
        <label>Nom
            <input name="last_name" required>
        </label>
    </div>
    <div class="form-grid">
        <label>E-mail
            <input type="email" name="email" required>
        </label>
        <label>Telephone
            <input name="phone" required>
        </label>
    </div>
    <div class="form-grid">
        <label>Profil
            <select name="profile" required>
                <option value="">Choisir</option>
                <option>Particulier</option>
                <option>Salarie</option>
                <option>Demandeur d emploi</option>
                <option>Entreprise</option>
                <option>Organisme / prescripteur</option>
            </select>
        </label>
        <label>Formation visee
            <select name="formation" required>
                <option value="">Choisir</option>
                <?php foreach (site_data('formations') as $item): ?>
                    <option><?= e($item['title']) ?></option>
                <?php endforeach; ?>
            </select>
        </label>
    </div>
    <label>Financement envisage
        <select name="funding">
            <option>Je ne sais pas encore</option>
            <option>CPF</option>
            <option>OPCO</option>
            <option>Entreprise</option>
            <option>Financement personnel</option>
        </select>
    </label>
    <label>Precision utile
        <textarea name="message" rows="4"></textarea>
    </label>
    <label class="checkbox">
        <input type="checkbox" name="consent" value="1" required>
        <span>J accepte que mes informations soient utilisees pour traiter ma demande.</span>
    </label>
    <button class="btn btn-primary" type="submit">Demander un devis</button>
    <p class="form-status" role="status"></p>
</form>
