<?php

class Route {

    const CONTROLLER = "Site"; //main

    static protected $params = array();

    static function start() {
        // by default
        $controller_name = self::CONTROLLER;
        $action_name = 'index';

        $routes = explode('/', $_SERVER['REQUEST_URI']);

        // action
        if (!empty($routes[1])) {
            $action_name = $routes[1];
        }
        // get parameters if they exist, else empty array
        self::explodeParameters($routes[2]);

        // add prefixes
        $model_name = 'Model_' . $action_name;
        $controller_name = 'Controller_' . $controller_name;
        $action_name = 'action_' . $action_name;


        // pick MODEL name and path if it exist
        $model_file = strtolower($model_name) . '.php';
        $model_path = "application/models/" . $model_file;
        if (file_exists($model_path)) {
            include "application/models/" . $model_file;
        } else {
            $model_name = "";
        }

        // pick CONTROLLER name and path if it exist
        $controller_file = strtolower($controller_name) . '.php';
        $controller_path = "application/controllers/" . $controller_file;
        if (file_exists($controller_path)) {
            include "application/controllers/" . $controller_file;
        } else {
            Route::ErrorPage404();
        }

        // create controller with parameters
        $controller = new $controller_name($model_name);
        $action = $action_name;

        if (method_exists($controller, $action)) {
            $controller->$action(self::$params);
        } else {
            Route::ErrorPage404();
        }
        
    }

    static function ErrorPage404() {
        $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:' . $host . '404');
    }

    static private function explodeParameters($paramsArray) {
        if (!empty($paramsArray)) {
            $params = $paramsArray;
            $pairs = explode('&', $params);
            foreach ($pairs as $pair) {
                $part = explode('=', $pair);
                // SQL Injection protection !!!
                self::$params[$part[0]] = DB::esc(urldecode($part[1]));
            }
        }
    }
    
    private function __construct(){}
    private function __clone(){}

}
