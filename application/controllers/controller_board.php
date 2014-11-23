<?php

// Board Controller


class Controller_Board extends Controller {

    function __construct($model_name, $params = array()) {
        $this->params = $params;
        parent::init($model_name, $params);
    }
    
    function action_index() {
        header("Location: ../");
    }
    
    function action_category() {
        if(isset($_GET['id']) && $_GET['id']>0 ){
            $id = DB::esc(intval($_GET['id']));
            $category = new Category($id, $this->model);
            $this->view->setData(array("category"=>$category));
            $this->view->setTitle($category->getName());
            $this->view->display('category_view.php');
        }else{
            $this->action_404();
        }
        
    }

    


}
