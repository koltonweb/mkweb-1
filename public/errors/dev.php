<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Исключение!</title>
</head>
<body>
    <h1>Произошла ошибка</h1>
    <p><b>Код ошибки:</b> <?=$errno; echo ' ' . $response?></p>
    <p><b>Текст ошибки:</b> <?=$errstr?></p>
    <p><b>Файл, в котором произошла ошибка:</b> <?=$errfile?></p>
    <p><b>Строка, в которой произошла ошибка:</b> <?=$errline?></p>
    <a href="<?=PATH?>">Вернуться на главную страницу</a>
</body>
</html>