<?php

class AdvertExchange extends Advert{
    private $id;
    private $title;
    private $content;
    private $type;
    private $date;
    private $author;
    private $exchItemId;
    private $model;
            
    function __construct($model, $id, $title, $content, $type, $date) {
        $this->model = $model;
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->type = $type;
        $this->author = $this->initAuthor();
        $this->date = $date;
    }
    
    public function getId() {
        return $this->id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getContent() {
        return $this->content;
    }

    public function getType() {
        switch ($this->type) {
            case 1: return "Куплю";
            case 2: return "Продам";
            case 3: return "Обміняю";

            default: return "Куплю";
        }
    }

    public function getDate() {
        return $this->date;
    }
    
    public function getAuthor() {
        return $this->author;
    }

    private function initAuthor() {
        //$this->id = $this->model->getAdvertAuthor($this->id);
    }
    
    public function getExchItem() {
        return $this->exchItemId;
    }



}
