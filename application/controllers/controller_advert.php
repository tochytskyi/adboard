<?php

class Controller_Advert extends Controller {

    function __construct($model_name, $params = array()) {
        $this->params = $params;
        parent::init($model_name, $params);
    }
    
    function action_index() {
        $this->action_404();   
    }
    
    function action_show() {
        if(isset($_GET['id']) && $_GET['id']>0 ){
            $id = DB::esc(intval($_GET['id']));
            $this->data = $this->model->getAdvert($id);
            $this->view->setData($this->data);
            $this->view->setTitle($this->data['title']);
            $this->view->display('advert_view.php');
        }else{
            $this->action_404();
        }
        
    }
    
    function action_write() {
       if(isset($_POST['from'])){
           $to = $_POST['to'];
           $from = $_POST['from'];
           $text = $_POST['text'];
           $author = $_POST['author'];
           $msg = new Message($text, $author, $to, $from);
           $msg->send();
       }
        
    }
    
    function action_addToBookmarks() {
        if(isset($_POST["id"],$_POST["userid"])){
            $id = $_POST["id"];
            $userid = $_POST["userid"];
            echo $this->model->addToBookmarks($id,$userid);
        }
    }

    


}
