<?php

namespace mkweb;

use Exception;

/**
 *  маршрутизатор
 */
class Router
{
    // хранит таблицы маршрутов, полученные из методом Router::addRoute()
    private static $routes = [];
    // хранит текущий маршрут, полученный из строки запроса URI
    private static $route = [];

    /**
     *  получает таблицу маршрутов
     *  метод вызывается в файле /config/routes.php
     */
    public static function addRoute($regexp, $route = [])
    {
        self::$routes[$regexp] = $route;
    }

    // Направляет на запрошенный маршрут (если он корректный) вызывает контроллеры и их методы (экшены)
    // В противном случае выбрасывает исключение (если URL не корректный)
    // Метод вызывается из класса App
    public static function dispatch($uri)
    {
        
        // Удаляет из строки запроса (URL) явные get параметры,
        // но доступ через $_GET[] массив остается
        $uri = self::removeGetParamsQueriesString($uri);

        // Проверяет строку запроса на соответствие с заданными маршрутами
        if (self::matchRoute($uri)) {

            // Составное имя класса контроллера полученного из свойства self::$route
            // (первая часть строки выступает в качестве namespace классов контроллеров)
            
            $controller = 'app\controllers\\' . self::$route['prefix'] . self::$route['controller'] . 'Controller'; 
            
            
            // Проверяет существует ли контроллер с таким именем
            // Если такой есть, то создает объек данного контроллера
            if (class_exists($controller)) {
                $controllerObj = new $controller(self::$route);

                // Получает имя метода контроллера (Экшена)
                // И приводит его в формат camelCase (первый символ строчный)
                $action = self::lowerCamelCase(self::$route['action']) . 'Action';

                // Проверяет существует ли у данного контроллера такой метод
                if (method_exists($controllerObj, $action)) {
                    $controllerObj->$action();

                    // И также вызывается метод getView() базового контроллера
                    $controllerObj->getView();
                } else {
                    throw new Exception("Не найден метод с именем: {$action} в контроллере: {$controller}", 404);

                }
            } else {
                throw new Exception("Не найден контроллер с именем: {$controller}", 404);
            }

        } else {
            throw new Exception('Страница не найдена', 404);
        }
    }

    // Проверяет на корректность, запрошенный маршрут из URL
    public static function matchRoute($uri)
    {
        // Переберает в цикле маршруты, добавленные в фале /config/routes.php
        // И если совпадение найдено, присваивает маршрут свойству self::$route
        foreach (self::$routes as $pattern => $route) {
            if (preg_match("#{$pattern}#", $uri, $matches)) {

                // Получает только строковые ключи из массива $matches
                foreach ($matches as $k => $v) {
                    if (is_string($k)) {
                        $route[$k] = $v;
                    }
                }

                // Назначение экшена (метода контроллера) по умолчанию
                // если он не был явно указан в запросе URL
                if (empty($route['action'])) {
                    $route['action'] = 'index';
                }

                // Проверка на содержание ключа "prefix" для админки
                if (!isset($route['prefix'])) {
                    $route['prefix'] = '';
                } else {
                    $route['prefix'] .= '\\';
                }

                // Приводит имя контроллера в CamelCase
                $route['controller'] = self::upperCamelCase($route['controller']);
                self::$route = $route;
                return true;
            }
        }
        return false;

    }

    // Приводит строку в формат CamelCase (первая буква заглавная)
    // Пример CamelCase
    private static function upperCamelCase($str)
    {
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $str)));
    }

    // Приводит строку в формат camelCase (первая буква строчная)
    // Пример camelCase
    private static function lowerCamelCase($str)
    {
        return lcfirst(self::upperCamelCase($str));
    }

    // Вырезает из строки запроса (URL) get параметры,
    // но доступ через $_GET[] массив остается
    private static function removeGetParamsQueriesString($uri)
    {
        if ($uri) {

            // Разбивает URL по символу '&', так как символ '?' явного get параметра,
            // преобразуется в амперсант (&) из-за флага QSA в файле /public/.htaccess.
            // И получает массив посредству вызова встроенной функции explode();
            $params = explode('&', $uri, 2);

            // Ищет в нулевом элементе массива символ '='
            // если таковой присутствует возвращает пустую строку
            // в противном случае возвращает элемент без изменения
            if (false === strpos($params[0], '=')) {
                return rtrim($params[0], '/');
            } else {
                return '';
            }
        }
    }

}
