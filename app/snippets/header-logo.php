<?php global $settings; ?>

<?php $path = "assets/img/{$settings['logo']}"; ?>

<?php if (file_exists($path)): ?>
    <div class="logo">
        <a class="logo__link" href="/">
            <img src="<?= $path ?>" alt="Logotype">
        </a>
    </div>
<?php else: ?>
    <div class="logo">
        <h1 class="logo__title">
            <a class="logo__link" href="/">
                <?= $settings['name']; ?>
            </a>
        </h1>
    </div>
<?php endif; ?>