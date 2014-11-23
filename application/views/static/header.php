<div class="logo">
    <a href="../">NF BBS | Дошка оголошень</a>
</div>
<div class="cabinet">
    <?php 
        if(isset($_SESSION["user"]) && isset($_SESSION["id"])){
            echo "<a href='".ROOT."/user/logout'>Вийти | </a>";
            echo "<a href='".ROOT."/user/cabinet'>Кабінет</a>";
        }else{
            echo "<a href='".ROOT."/user/signin'>Ввійти | </a>";
            echo "<a href='".ROOT."/user/signup'>Реєстрація</a>";
        }
        
    ?>

    
</div>


