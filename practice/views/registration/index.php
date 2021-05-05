<form method="post" class="sign-form">
    <h1>Регистрация</h1>
    <label> Введите логин
        <input type="text" class="text-input" name="login" maxlength="32" minlength="4" pattern="^[A-Za-z0-9]{2,32}$" required>
        <?php if (isset($data)): ?>
            <span class="error"><?= $data?></span>
        <?php else: ?>
        <?php endif; ?>
    </label>
    <label> Введите пароль
        <input type="password" class="text-input" name="password" maxlength="32" minlength="4" required>
    </label>
    <input type="submit" name="submit">
</form>