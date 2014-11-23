<?php
    require_once TPL_DIR.'/user/cabinet/cabinet_view.php';
?>
<br/>
<div class="profile">
    <hr/>
    <b>Баланс:</b> <?=$this->data["user"]->getBalance()?> грн
    <hr/>
    <i style="float: right; font-size: 15px; cursor: pointer;">
        <a href="<?=ROOT?>/user/increase_balance">Поповнити баланс</a>
    </i>
</div>


