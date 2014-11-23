<?php

// Main Controller


class Controller_Blog extends Controller {

    function __construct($model_name, $params = array()) {
        $this->params = $params;
        parent::init($model_name, $params);
    }
    
    function action_index() {
        $this->view->setData($this->data);
        $this->view->setTitle("Blog");
        $this->view->display('blog_view.php');
    }


    


}
