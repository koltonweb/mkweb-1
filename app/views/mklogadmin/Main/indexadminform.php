
<div class="login">
<form method="post" class="login-form">
    <div class="info-error">
        <span style="color: #FF0000; font-size: 20px;"><?=@$error_access;?></span>
    </div>
<div>
        <label for="username"> Имя пользователя:</label>
        <input type="email" name="username" id="username">
        </div>
        <div>
        <label for="password"> Пароль: </label>
        <input type="password" name="password" id="password">
        </div>
    <input type="hidden" name="action" value="login">
    <div>
    <input type="submit" value="Войти">
    </div>
</form>
</div>
