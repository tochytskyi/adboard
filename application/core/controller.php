<?php

abstract class Controller {

    protected $model;
    protected $view;
    protected $data;
    protected $params;


    // действие (action), вызываемое по умолчанию
    abstract function action_index();

    function init($model_name, $params){
        $this->view = new View();
        $this->params = $params;
        if ($model_name !== "") {
            $this->model = new $model_name();
        }
    }
    
    static function action_404() {
        $view = new View();
        $view->setTitle("Error page");
        $view->display('/static/404_view.php');
    }
}
