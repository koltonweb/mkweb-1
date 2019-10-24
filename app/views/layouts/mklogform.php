<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Админ</title>
    <link rel="stylesheet" href="/login/css/style.css">
    <link rel="stylesheet" href="/login/css/normalize.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="/login/js/main.js"></script>
</head>
<body>
    <header>
        <div class="container">
            <ul>
                <li><a id="new-mess">Заявка на заказ</a></li>
                <li><a href="?">Настройки</a></li>
            <?php if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true):?>
                <li><a href="?action=logout">Выйти</a></li>
            <?php endif;?>
            </ul>
        </div>
    </header>
    <?=$content;?>
</body>
</html>