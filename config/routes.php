<?php

// Задает таблицы маршрутов в классе Router /vendor/mkweb/core/Router.php

use mkweb\Router;

Router::addRoute('^mklogadmin$', ['controller' => 'Main', 'action' => 'index', 'prefix' => 'mklogadmin']);
Router::addRoute('^mklogadmin/?(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$', ['prefix' => 'mklogadmin']);

Router::addRoute('^$', ['controller'=> 'Main', 'action'=> 'index']);
Router::addRoute('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');