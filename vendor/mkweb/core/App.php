<?php

namespace mkweb;

/**
 *  класс ядра приложения
 */
class App
{
    // статическое свойство для хранения объекта класса Regestry (реестра)
    public static $app;
    public function __construct()
    {
        // получает строку запроса URI из переменной окружения QUERY_STRING и обрезает концевой слэш
        $query_str = trim($_SERVER['QUERY_STRING'], '/');
        session_start();
        // создает объект класса реестра по средству вызова статик метода (паттерн синглтон трэйт TSingletone)
        self::$app = Regestry::instance();
        // вызов метода объекта текущего класса
        // для передачи данных объекту класса Regestry (реестру)
        $this->getParams();
        // создает объект класса обработки исключений
        new ErrorHandler();
        // передает классу Router (маршрутизатору) строку запроса URI
        Router::dispatch($query_str);

    }

    /**
     *  @return void
     *  передает объекту класса реестра массив данных из файла /config/params.php
     */
    public function getParams()
    {
        $params = require_once CONF . '/params.php';

        if (!empty($params)) {
            foreach ($params as $k => $v) {
                self::$app->setProperty($k, $v);
            }
        }
    }
}
