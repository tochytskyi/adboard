<?php

// Main Controller


class Controller_Admin extends Controller {

    public $user;
    
    function __construct($model_name, $params = array()) {
        $this->params = $params;
        parent::init($model_name, $params);
        if (isset($_SESSION["user"]) && isset($_SESSION["id"])) {
            $this->user = new RegisteredUser($_SESSION["id"], $this->model); 
        } else {
            $this->user = new GuestUser();
        }
        $this->view->setData(array("user"=>$this->user));
    }
    
    function action_index() {
        if(isset($_POST["login"]) && isset($_POST["pwd"])){
            $this->model->signin();
            
        }elseif($this->user->isAdmin()){
            $this->view->setTitle("Admin page");
            $this->view->display('admin_view.php');
        }else{
            error("You don't have admin rights");
        }
        
    }
    
    

    


}
