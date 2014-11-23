<?php
    require_once TPL_DIR.'/user/cabinet/cabinet_view.php';
?>
<h1 class="title">Закладки</h1>
<div class="cabinet-adv-list">
    <?php
    $list = $this->data["bookmarks"];
    foreach ($list as $advert) {
            echo '<div class="advert">';
            echo '<a href="http://adboard/advert/show/?id='.$advert['id'].'" class="adv-title">';
            echo $advert['date'].' &#9679; ';
            echo $advert['title'].'&#9679;</a>';
            echo '<p class="adv-cont">'.$advert['content'].'</p>';
            echo '<p class="adv-type">'.Advert::typeName($advert['type']).'</p>';
            echo '</div>';
    };
    ?>
    
</div>


