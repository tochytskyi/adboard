<?php


abstract class User{
    
    protected $session_id;
    
    abstract function isAdmin();
    abstract function getId();
}
