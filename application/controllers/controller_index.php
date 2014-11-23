<?php

// Board Controller


class Controller_Index extends Controller {

    function __construct($model_name, $params = array()) {
        $this->params = $params;
        parent::init($model_name, $params);
    }
    
    function action_index() {
        $this->data = $this->model->getData();
        $this->view->setData($this->data);
        $this->view->setTitle("Main page");
        $this->view->display('index_view.php');
    }
    
    function action_category() {
        $this->data = $this->model->getTestData();
        $this->view->setData($this->data);
        $this->view->setTitle("Main page");
        $this->view->display('index_view.php');
    }

    


}
