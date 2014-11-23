<?php

// Main Controller


class Controller_Post extends Controller {

    function __construct($model_name, $params = array()) {
        $this->params = $params;
        parent::init($model_name, $params);
    }
    
    function action_index() {
        $this->data = $this->model->getData();
        $this->view->setData($this->data);
        $this->view->setTitle("Guest user page");
        $this->view->display('guest_view.php');
    }
   
    


}
