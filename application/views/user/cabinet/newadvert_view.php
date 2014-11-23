<?php
    require_once TPL_DIR.'/user/cabinet/cabinet_view.php';
?>

<form id="newadvert-form" action="javascript:void()" method="post" onsubmit="newAdvert('#newadvert-form')">
    <input type="text" name="holder" value="<?=$this->data['user']->getId()?>" hidden=""/>
    <a>Заголовок</a><input type="text" name="title"/><br/><br/>
    <a>Тип</a>
    <select size="1" name="type">
        <option disabled>Виберіть тип оголошення</option>
        <option value="1">Продам</option>
        <option value="2">Куплю</option>
        <option value="3">Обміняю</option>        
    </select>
    <br/><br/>
    <a>Категорія</a>
    <select size="1" name="category">
        <option disabled>Виберіть категорію</option>
        <?=$this->data["categories"]?> 
    </select>
    <br/><br/>
    <a>Телефон</a><input type="text" name="tel" value="<?=$this->data['user']->getTel()?>"/><br/><br/>
    <a>Email</a><input type="text" name="email" value="<?=$this->data['user']->getEmail()?>"/><br/><br/>
    <a>Текст</a><textarea name="content" style="width: 100%; height: 100px;"/></textarea><br/><br/>
    <input type="submit" value="ОК" class="submit-btn"/> 
</form>


