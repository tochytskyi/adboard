<?php
    if(isset($this->data["category"])){
        $category = $this->data["category"];   
    }  
?>
<a href="<?=ROOT?>" class="back">Всі категорії</a>
<form id="searchbox" action="javascript:void(0)" onsubmit="search()" method="post" >
    <input id="search" type="text" placeholder="Наприклад: квартира на Подолі">
    <input id="submit" type="submit" value="Пошук">
</form>
<div class="sort">
    <a href="">За датою </a>|
    <a href=""> За алфавітом </a>|
    <a href=""> За переглядами </a>|
    <a href=""> Топ |</a>
    <select id="sort-type">
        <option>продам</option>
        <option>куплю</option>
        <option>обміняю</option>
    </select>
</div>

<div class="category">
    <h1 class="title"><?=$category->getName()?></h1>
    
    <div class="cat-desc">
        <?=$category->getDescription()?>
    </div>
    <div class="cat-adv-list">
        <?php
        $list = $category->getAdvertsList();
        if (empty($list)) {
            echo '<div class="cat-desc">Немає оголошень</div>';
        } else {
            $str = "";
            foreach ($list as $advert) {
                $str.= "<div class='advert'>"
                        . "<a href='" . ROOT . "/advert/show/?id={$advert->getId()}' "
                        . "class='adv-title'>" . $advert->getDate() . " | " . $advert->getTitle() . "</a>";
                $str.= "<p class='adv-cont'>" . $advert->getContent() . "</p>";
                $str.= "<a class='adv-date'>" . $advert->getType() . "</a>";
                $str.= "</div>";
            }
            echo $str;
        }
        ?>
    </div>
</div>



