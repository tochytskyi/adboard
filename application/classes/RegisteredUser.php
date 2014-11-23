<?php

class RegisteredUser extends User implements IPublishable {

    private $id;
    private $name;
    private $sername;
    private $city;
    private $tel;
    private $email;
    private $login;
    private $model;
    private $balance;
    private $paramsArray;
    
    function __construct($id, $model) {
        $this->model = $model;
        $this->id = $id;
        $this->paramsArray = $this->initParamsArray();
        $this->session_id = uniqid();
        $this->name = $this->paramsArray["name"];
        $this->sername = $this->paramsArray["sername"];
        $this->city = $this->paramsArray["city"];
        $this->tel = $this->paramsArray["tel"];
        $this->email = $this->paramsArray["email"];
        $this->login = $this->paramsArray["login"];
        $this->balance = $this->paramsArray["balance"];
    }
    
    private function initParamsArray() {
        return $this->model->getUserParams($this->id);
    }

    public function addAdvert() {
        $this->model->addAdvert();
    }

    public function addComment($id) {
        $this->model->addComment($id);
    }

    public function editAdvert($id) {
        $this->model->editAdvert($id);
    }
    
    public function deleteAdvert($id) {
        $this->model->deleteAdvert($id);
    }

    public function editComment($id) {
        $this->model->editComment($id);
    }

    public function editProfile() {
        $this->model->editProfileAdvert();
    }

    public function increaseBalance() {
        return $this->model->increaseBalance($this->id);
    }

    public function promoteAdvert() {
        return $this->model->promoteAdvert($this->id);
    }

    public function showProfile() {
        return $this->model->getProfile($this->id);
    }

    public function showAdverts() {
        return $this->model->getAdverts($this->id);
    }
    
    public function getName() {
        return $this->name;
    }

    public function getSername() {
        return $this->sername;
    }

    public function getCity() {
        return $this->city;
    }

    public function getTel() {
        return $this->tel;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getLogin() {
        return $this->login;
    }
    
    public function getBalance() {
        return $this->balance;
    }

    public function isAdmin() {
        return $this->model->isAdmin($this->login);
    }
    public function getId() {
        return $this->id;
    }


}
