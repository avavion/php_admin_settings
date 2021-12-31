<?php global $settings; ?>
<?php global $isAdmin; ?>

<ul class="menu">
    <?php if ($isAdmin): ?>
        <li class="menu__item">
            <a href="admin.php" class="menu__link">
                Панель администратора
            </a>
        </li>
    <?php endif; ?>
</ul>