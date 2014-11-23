<?php
    require_once TPL_DIR.'/user/cabinet/cabinet_view.php';
?>
<br/>
<div class="profile">
    <b>Ім'я:</b> <input type="text" value="<?=$this->data["user"]->getName()?>" disabled="true"> <hr/><br/>
    <b>Прізвище:</b> <input type="text" value="<?=$this->data["user"]->getSername()?>" disabled="true"> <hr/><br/>
    <b>Місто:</b> <input type="text" value="<?=$this->data["user"]->getCity()?>" disabled="true"> <hr/><br/>
    <b>Телефон:</b> <input type="text" value="<?=$this->data["user"]->getTel()?>" disabled="true"> <hr/><br/>
    <b>email:</b> <input type="text" value="<?=$this->data["user"]->getEmail()?>" disabled="true"> <hr/><br/>
    <b>Логін:</b> <input type="text" value="<?=$this->data["user"]->getLogin()?>" disabled="true"> <hr/><br/>
    <a href="javascript: $('.profile-edit').show(); $('.profile').remove();">Редагувати </a>
    |<a href=""> Видалити</a>
</div>

<div class="profile-edit" hidden="true">
    <form id="edit-profile" action="javascript:void(0)" method="post">
    <b>Ім'я:</b> <input type="text" value="<?=$this->data["user"]->getName()?>"> <hr/><br/>
    <b>Прізвище:</b> <input type="text" value="<?=$this->data["user"]->getSername()?>"> <hr/><br/>
    <b>Місто:</b> <input type="text" value="<?=$this->data["user"]->getCity()?>"> <hr/><br/>
    <b>Телефон:</b> <input type="text" value="<?=$this->data["user"]->getTel()?>"> <hr/><br/>
    <b>email:</b> <input type="text" value="<?=$this->data["user"]->getEmail()?>"> <hr/><br/>
    <b>Логін:</b> <input type="text" value="<?=$this->data["user"]->getLogin()?>"> <hr/><br/>
    <a href="">Зберегти</a>|<a href=""> Відмінити</a>
    </form>
</div>


