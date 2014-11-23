<?php

class GuestUser extends User {
    
    private $model;
            
    function __construct($model) {
        $this->model = $model;
    }
    
    public function getId() {
        return uniqid();
    }

    public function isAdmin() {
        return FALSE;
    }

    public function registration(){
        $this->model->signup();
    }
}
