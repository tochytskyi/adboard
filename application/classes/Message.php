<?php

class Message {
    private $id;
    private $text;
    private $author;
    private $to;
    private $from;
    
    function __construct($text, $author, $to, $from) {
        $this->text = $text;
        $this->author = $author;
        $this->to = $to;
        $this->from = $from;
    }
    
    public function send() {
        //TODO;
    }
    public function getId() {
        return $this->id;
    }

    public function getText() {
        return $this->text;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function getTo() {
        return $this->to;
    }

    public function getFrom() {
        return $this->from;
    }

    public function setText($text) {
        $this->text = $text;
    }

    public function setTo($to) {
        $this->to = $to;
    }

    public function setFrom($from) {
        $this->from = $from;
    }



}
