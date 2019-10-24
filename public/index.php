<?php

/**
 *  Фронт контроллер
 */
require_once dirname(__DIR__) . '/config/init.php'; // файл содержит константы с директориями и а файл автозагрузчика
require_once LIBS . '/dumper.php'; // файл содержит функцию для распечатки объектов любой сложности (нужна для дебага)
require_once LIBS . '/htmlspec.php';
require_once CONF . '/routes.php'; // файл содержит таблицы маршрутов, которые передаются в класс Router

// namespace класса App (класс ядра приложения)
use mkweb\App;

// создает объект класса App
$app = new App;
