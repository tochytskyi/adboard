<?php

class Route {

    static function start() {
        
        $CONTROLLER = "index"; //main controller
        $ACTION = "index"; //default action
        $params = array();
        $routes = explode('/', $_SERVER['REQUEST_URI']);

        /* controller */
        if (!empty($routes[1])) {
            $CONTROLLER = $routes[1];
        }
        
        /* action */
        if (!empty($routes[2])) {
            $ACTION = $routes[2];
        }
        
        
        // get parameters if they exist, else empty array
        //self::explodeParameters($routes[2]);

        /* add prefixes */
        $model_name = 'model_' . $CONTROLLER;
        $controller_name = 'controller_' . $CONTROLLER;
        $action_name = 'action_' . $ACTION;


        // pick MODEL name and path if it exist
        $model_file = strtolower($model_name) . '.php';
        $model_path = "application/models/" . $model_file;
        if (file_exists($model_path)) {
            require_once "application/models/" . $model_file;
        }else{
            $model_name = "";
            // if controller doesn't have the model
        }

        // pick CONTROLLER name and path if it exist
        $controller_file = strtolower($controller_name) . '.php';
        $controller_path = "application/controllers/" . $controller_file;
        if (file_exists($controller_path)) {
            require_once "application/controllers/" . $controller_file;
            // create controller with parameters
            $controller = new $controller_name($model_name);
        } else {
            Route::ErrorPage404();
        }
    

        if (method_exists($controller, $action_name)) {
            $controller->$action_name();
        } else {
            Route::ErrorPage404();
        }
        
    }

    static function ErrorPage404() {
        $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        Controller::action_404();
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
