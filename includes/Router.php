<?php

class Router
{
    private $routes;

    public function __construct() {
        $routesPath = ROOT . "/config/routes.php";
        $this->routes = include($routesPath);
    }

    public function run() {

        // Получить строку запроса
        $uri = $this->getURI();

        // Проверить наличие такого запроса в routes.php
        foreach ($this->routes as $uriPatterns => $path) {
            if(preg_match("~$uriPatterns~",$uri)) {

                // Получаем внутренний путь из внешнего
                $internalRoute = preg_replace("~$uriPatterns~",$path,$uri);

                // Определить контроллер, action и параметры

                $segments = explode('/',$internalRoute);

                $controller = ucfirst(array_shift($segments))."Controller";
                $action = "action" . ucfirst(array_shift($segments));

                $params = $segments;

                 // Подключить файл класса-контроллера
                $controllerFile = ROOT . '/controllers/' . $controller . '.php';
                if (file_exists($controllerFile)) {
                    include_once ($controllerFile);
                }

                // Создать объект, вызвать метод (action)
                $controllerObject = new $controller;
                $result = call_user_func_array(array($controllerObject, $action),$params);

                if ($result != null) {
                    break;
                }

            }
        }
    }

    private function getURI() {
        if (!empty($_SERVER['REQUEST_URI'])) {
           return trim($_SERVER['REQUEST_URI'],'/');
        }
    }
}