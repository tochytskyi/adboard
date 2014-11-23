<?php

// Main Controller


class Controller_User extends Controller {

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
        $this->action_signin();
    }

    function action_signup() {
        if(isset($_POST["login"])){
            $this->user->signup();
        }else{
            $this->view->setData($this->data);
            $this->view->setTitle("Sign up");
            $this->view->display('user/signup_view.php');
        }  
    }

    function action_signin() {    
        if(isset($_SESSION["user"])){
            header("Location:".ROOT."/user/cabinet");
        }
        if(isset($_POST["login"]) && isset($_POST["pwd"])){
            $this->model->signin();
            
        }else{
            $this->view->setTitle("Sign in");
            $this->view->display('user/signin_view.php');
        }
    }

    function action_logout() {        
        unset($_SESSION["user"], $_SESSION["id"]);
        session_destroy();
        header("Location: ../");
    }

    function action_profile() {       
        if ($this->user instanceof IPublishable) {
            $this->view->setTitle("Profile");
            $this->view->display('user/cabinet/profile_view.php');
        } else {
            $this->action_signin();
        }
    }
    
    function action_editProfile() {       
        if ($this->user instanceof IPublishable) {
            $this->view->setData($this->user->editProfile());
            $this->view->setTitle("Profile");
            $this->view->display('user/cabinet/profile_view.php');
        } else {
            $this->action_signin();
        }
    }

    function action_balance() {         
        if ($this->user instanceof IPublishable) {
            $this->view->setTitle("Balance");
            $this->view->display('user/cabinet/balance_view.php');
        } else {
            $this->action_signin();
        }
    }
    
    function action_Increase_Balance() {         
        if ($this->user instanceof IPublishable) {
            $this->view->setTitle("Increase balance");
            $this->view->display('user/cabinet/increasebalance_view.php');
        } else {
            $this->action_signin();
        }
    }

    function action_cabinet() {        
        if ($this->user instanceof IPublishable) {
            header("Location: ".ROOT."/user/bookmarks");
        }else{
            $this->action_signin();
        }
    }

    function action_adverts() {        
        if ($this->user instanceof IPublishable) {
            $this->view->setTitle("My adverts");
            $this->view->display('user/cabinet/adverts_view.php');
        }else{
            $this->action_signin();
        }
    }
    
    function action_addAdvert() {        
        if ($this->user instanceof IPublishable) {
            if(isset($_POST["title"])){
                return $this->model->addAdvert();
            }
            $this->view->data["categories"] = $this->model->getCategoriesList();
            $this->view->setTitle("New advert");
            $this->view->display('user/cabinet/newadvert_view.php');
        }else{
            $this->action_signin();
        }
    }
    
    function action_editAdvert() {        
        if ($this->user instanceof IPublishable) {
            $this->view->setTitle("Edit advert");
            $this->view->display('user/cabinet/editadvert_view.php');
        }else{
            $this->action_signin();
        }
    }
    
    function action_deleteAdvert() {        
        if (isset($_SESSION["user"]) && $this->user instanceof IPublishable) {
            $id = DB::esc($_GET["id"]);
            if($this->model->deleteAdvert($id)){
                header("Location: ".ROOT."/user/adverts");
            }
        }
    }
    
    function action_promote() {        
        if ($this->user instanceof IPublishable) {
            $this->view->setTitle("Promote advert");
            $this->view->display('user/cabinet/promoteadvert_view.php');
        }else{
            $this->action_signin();
        }
    }
    
    function action_bookmarks() {
        if ($this->user instanceof IPublishable) {
            $this->view->data["bookmarks"] = $this->model->getBookmarks($this->user->getId());
            $this->view->setTitle("Bookmarks");
            $this->view->display('user/cabinet/bookmarks_view.php');
        }else{
            $this->action_signin();
        }
    }
    
  

}
