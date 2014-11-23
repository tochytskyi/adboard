<?php

class View {

    protected $title = "Title";
    public $data = array();
    
    public function __construct() {
    }
            
    function display($content_view, $template_view = "template_view.php") {
        require_once TPL_DIR.'/static/' . $template_view;
        require_once TPL_DIR.'/'.$content_view;
    }

    function getTitle() {
        return $this->title;
    }

    function setTitle($title) {
        $this->title = "NF BBS | ".$title;
        return $title;
    }
    
    function setData($data) {
        $this->data = $data;
    }

}
