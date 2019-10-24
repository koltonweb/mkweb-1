<?php
// подключение к базе данных 
// вызывается из класса DB в /vendor/mkweb/core/DB.php
return [
    'dsn'       => 'mysql:host=localhost;dbname=kostin', 
    'username'  => 'maxkoltan',
    'password'  => 'l;fdfcrhbgncj,frf0204smeshariki21',
    'except'    => [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
];