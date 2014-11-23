<a href="<?= ROOT ?>/board/category/?id=<?= $this->data["category_id"]; ?>" class="back">До категорії </a>| 
<a href="<?= ROOT ?>" class="back"> Всі категорії</a><br/><br/>

<div class="advert">
    <p class="adv-title"><h3><?= $this->data["title"]; ?></h3></p>
    <div class="adv-content"><?= $this->data["content"]; ?></div>
    <p class="adv-author"><?= $this->data["author"]; ?></p>
    <p class="adv-date"><?= $this->data["date"]; ?> | тел: <?= $this->data["tel"]; ?> | email: <?= $this->data["email"]; ?></p>
   
    <a class="adv-write" href="javascript: showWriteForm()">Написати автору</a>
    <?php 
        if(isset($_SESSION['user'])){
            echo '<a class="adv-write" href="javascript: '
            . 'addToBookmarks('.$this->data["id"].','.$_SESSION['id'].')">Додати в закладки</a>';
        } 
    ?>
    


    <div class="image-gallery">

        <div class="big-image">           
            <img id="html5" src="<?= ROOT ?>/images/users/kubik.jpg" />
            <img id="css3" src="<?= ROOT ?>/images/users/kubik2.jpg" />
            <img id="less" src="<?= ROOT ?>/images/users/kubik3.jpg" />
            <img id="modern" src="<?= ROOT ?>/images/users/kubik4.jpg" />
            <img id="default" src="<?= ROOT ?>/images/users/kubik.jpg" />
        </div>
        <ul>
            <li>
                <a href="#html5"><img  src="<?= ROOT ?>/images/users/kubik.jpg" /></a></li>
            <li>
                <a href="#css3"><img  src="<?= ROOT ?>/images/users/kubik2.jpg" /></a>
            </li>
            <li>
                <a href="#less"><img  src="<?= ROOT ?>/images/users/kubik3.jpg" /></a>
            </li>
            <li>
                <a href="#modern"><img  src="<?= ROOT ?>/images/users/kubik4.jpg" /></a>
            </li>
        </ul>
            
    </div>
    <br/>
    <form id="write-form" action="javascript:void(0)" method="post" hidden="true" onsubmit="sendMsg()">
        <b>Email:</b> <input type="text" value="<?=$this->data["userEmail"]?>"/> <hr/>
        <b>Текст:</b> <textarea></textarea>
        <br/>
        <input type="submit" value="Відправити" style="width: 100px;height: 30px;"/>
        <hr/>
    </form>
</div>



