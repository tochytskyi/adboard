<?php

class Item{
    private $title;
    private $price;
    private $create_date;
    private $id;
    private $author_id;
    private $category;
    
    function __construct($title, $price, $create_date, $id, $author_id, $category) {
        $this->title = $title;
        $this->price = $price;
        $this->create_date = $create_date;
        $this->id = $id;
        $this->author_id = $author_id;
        $this->category = $category;
    }
    
    public function getTitle() {
        return $this->title;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getCreate_date() {
        return $this->create_date;
    }

    public function getId() {
        return $this->id;
    }

    public function getAuthor_id() {
        return $this->author_id;
    }

    public function getCategory() {
        return $this->category;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function setCreate_date($create_date) {
        $this->create_date = $create_date;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setAuthor_id($author_id) {
        $this->author_id = $author_id;
    }

    public function setCategory($category) {
        $this->category = $category;
    }



}

