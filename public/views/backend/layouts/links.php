<div class="form-group input-group-lg mb-0">
    <select class="custom-select backend-links border text-muted" data-url="<?= DOMAIN; ?>">
        <?php if(empty($backendLinks)): ?>
            <option value="">No links yet</option>
        <?php else: ?>
            <?php $activeController = empty($activeController) ? "" : $activeController; ?>
            <?php foreach($backendLinks as $backendLink): ?>
                <option value="<?= $backendLink; ?>" <?= ($activeController === $backendLink) ? "selected" : ""; ?>>
                    <?= ucfirst($backendLink); ?>
                </option>
            <?php endforeach; ?>
        <?php endif; ?>
    </select>
</div>