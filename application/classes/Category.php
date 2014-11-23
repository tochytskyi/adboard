<?php

class Category {
    
    private $id;
    private $adverts_count;
    private $name;
    private $description;
    private $adverts_list;
    private $model;
            
    function __construct($id,$model) {
        $this->id = $id;
        $this->model = $model;
        $this->initAdvertsCount();
        $this->initName();
        $this->initDescription();
        $this->initAdvertsList();
        
    }
    
    public function getId() {
        return $this->id;
    }

    public function getAdvertsCount() {
        return $this->adverts_count;
    }

    public function getName() {
        return $this->name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getAdvertsList() {
        return $this->adverts_list;
    }
    
    private function initAdvertsList() {
        $this->adverts_list = $this->model->getCategoryAdvertsList($this->id);
    }
    
    private function initDescription() {
        $this->description = $this->model->getCategoryDescription($this->id);
    }
    
    private function initName() {
        $this->name = $this->model->getCategoryName($this->id);
    }
    
    private function initAdvertsCount() {
        
    }





    
    
}
