<section class="admin-shell">
    <form class="admin-card" method="post" action="/admin/login">
        <input type="hidden" name="csrf_token" value="<?= e(csrf_token()) ?>">
        <h1>Administration ARCS</h1>
        <p>Connexion reservee aux administrateurs.</p>
        <?php if (!empty($error)): ?>
            <div class="alert"><?= e($error) ?></div>
        <?php endif; ?>
        <label>Mot de passe
            <input type="password" name="password" autocomplete="current-password" required>
        </label>
        <button class="btn btn-primary" type="submit">Se connecter</button>
        <p class="muted">Configurez un mot de passe fort dans config.local.php avant mise en ligne.</p>
    </form>
</section>
