<?php if (isset($_SESSION['form-errors'])): ?>
    <div class="alert alert--danger" role="alert">
        This is a danger alert—check it out!
    </div>
<?php endif; ?>

<div class="alert alert--danger" role="alert">
    Указанная вами почта уже существует!
</div>

<div class="alert alert--danger" role="alert">
    Пользователь не был найден!
</div>

<div class="alert alert--danger" role="alert">
    Указанная вами почта не существует!
</div>

<div class="alert alert--danger" role="alert">
    Указанное имя пользователя уже существует!
</div>

<div class="alert alert--danger" role="alert">
    Минимальная длина пароля 6 символов!
</div>

<div class="alert alert--danger" role="alert">
    Пароли не совпадают!
</div>