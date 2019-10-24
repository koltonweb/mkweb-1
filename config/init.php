<?php

// Получение URL программным способом
$app_path = "{$_SERVER['REQUEST_SCHEME']}://{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}";
$app_path = preg_replace('#[^/]+$#', '', $app_path);
$app_path = str_replace('/public/', '', $app_path);

define('PATH', $app_path);
define('DEBUG', 1);
define('LAYOUT', 'default');
define('ROOT', dirname(__DIR__));
define('WWW', ROOT . '/public');
define('APP', ROOT . '/app');
define('CONF', ROOT . '/config');
define('CORE', ROOT . '/vendor/mkweb/core');
define('LIBS', CORE . '/libs');


require_once ROOT. '/vendor/autoload.php';

