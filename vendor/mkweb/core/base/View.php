<?php

namespace mkweb\base;

use Exception;

class View
{
    public $route;
    public $controller;
    public $model;
    public $view;
    public $prefix;
    public $layout;
    public $data = [];
    public $meta = [];

    public function __construct($route, $meta, $layout = '', $view = '')
    {
        // Помещает массив текущего маршрута
        $this->route = $route;
        // И отделно каждый элемент массива Router::$route соответственно
        $this->controller = $route['controller'];
        $this->view = $view;
        $this->model = $route['controller'];
        $this->prefix = $route['prefix'];
        $this->meta = $meta;

        if ($layout === false) {
            $this->layout = false;
        } else {
            $this->layout = $layout ?: LAYOUT;
        }

    }

    public function render($data)
    {
        if (is_array($data)) {
            extract($data);
        }

        if ($this->view !== false) {
            $viewFilePath = APP . "/views/{$this->prefix}{$this->controller}/{$this->view}.php";
            $viewFilePath = str_replace('\\', '/', $viewFilePath);
            if (is_file($viewFilePath)) {
                ob_start();
                require_once $viewFilePath;
                $content = ob_get_clean();
            } else {
                throw new Exception("Не найден вид: {$viewFilePath}", 500);
            }
        }

        if ($this->layout !== false) {
            $layoutFilePath = APP . "/views/layouts/{$this->layout}.php";
            if (is_file($layoutFilePath)) {
                require_once $layoutFilePath;
            } else {
                throw new Exception("Не найден шаблон: {$this->layout}.php", 500);
            }
        }

    }

    public function getMeta()
    {
        $output = "<title>{$this->meta['title']}</title>" . PHP_EOL;
        $output .= "<meta name=\"description\" content=\"{$this->meta['desc']}\">" . PHP_EOL;
        $output .= "<meta name=\"Keywords\" content=\"{$this->meta['keywords']}\">" . PHP_EOL;
        return $output;
    }

}
