<?php if (empty($records)): ?>
    <p class="muted">Aucun enregistrement pour le moment.</p>
<?php else: ?>
    <div class="record-list">
        <?php foreach (array_slice($records, 0, 8) as $record): ?>
            <article class="record">
                <strong><?= e($record['id'] ?? 'Sans reference') ?></strong>
                <span><?= e(($record['first_name'] ?? '') . ' ' . ($record['last_name'] ?? '')) ?></span>
                <small><?= e($record['email'] ?? '') ?></small>
                <small><?= e($record['created_at'] ?? '') ?></small>
                <?php if (!empty($record['status'])): ?>
                    <em><?= e($record['status']) ?></em>
                <?php endif; ?>
            </article>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
