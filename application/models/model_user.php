<?php

class Model_User extends Model {

   
    public function getUserParams($id) {
        $res = DB::query("SELECT * FROM users WHERE id={$id}");
        $row = $res->fetch_assoc();
        return $row;
    }

    public function signup() {
        $name = DB::esc($_POST["name"]);
        $sername = DB::esc($_POST["sername"]);
        $city = DB::esc($_POST["city"]);
        $tel = DB::esc($_POST["tel"]);
        $login = DB::esc($_POST["login"]);
        $pwd = DB::esc($_POST["pwd"]);
        $email = DB::esc($_POST["email"]);

        $res = DB::query("INSERT INTO users (name,sername,city,tel,email,login,password) "
                        . "VALUES('{$name}','{$sername}','{$city}','{$tel}','{$email}','{$login}','{$pwd}')");
        if ($res) {
            $json_data = array("result" => TRUE, "msg" => "Профіль створено. На ваш email відправлено лист з налаштуваннями.");
        } else {
            $json_data = array("result" => FALSE, "msg" => "Виникла помилка. Спробуйте ще раз");
        }
        echo json_encode($json_data);
    }

    public function signin() {
        $login = trim(DB::esc($_POST["login"]));
        $pwd = trim(DB::esc($_POST["pwd"]));

        $res = DB::query("SELECT * FROM users WHERE login='{$login}' AND password='{$pwd}'");
        $data = $res->fetch_assoc();
        if ($res->num_rows !== 0) {
            $json_data = array("result" => TRUE, "msg" => "Вітаємо, " . $data["name"] . " " . $data["sername"]);
            $_SESSION["id"] = $data["id"];
            $_SESSION["user"] = $data["name"] . " " . $data["sername"];
        } else {
            $json_data = array("result" => FALSE, "msg" => "Не вірний логін або пароль");
        }
        echo json_encode($json_data);
    }
    
    public function isAdmin($login) {
        $res = DB::query("SELECT * FROM admins WHERE login='{$login}'");
        return $res->num_rows !== 0 ? TRUE : FALSE;
    }
    
    public function getCategoriesList() {
        $res = DB::query("SELECT * FROM category");
        $data = $res->fetch_all(MYSQLI_ASSOC);
        $str = "";
        foreach ($data as $cat) {
            $str.= "<option value='{$cat["id"]}'>{$cat["name"]}</option>";
        };
        return $str;
    }
    
    public function addAdvert($title, $type, $tel, $email, $content, $category, $holder) {
        $title = DB::esc($_POST["title"]);
        $tel = DB::esc($_POST["tel"]);
        $email = DB::esc($_POST["email"]);
        $content = DB::esc($_POST["content"]);
        $category = DB::esc($_POST["category"]);
        $holder = DB::esc($_POST["holder"]);
        $type = DB::esc($_POST["type"]);
        $date = date("Y-m-d");
        $res = DB::query("INSERT INTO adverts (id_holder,title,content,type,category_id,date,tel,email) "
                        . "VALUES({$holder},'{$title}','{$content}',{$type},{$category},'{$date}','{$tel}','{$email}')");
        if ($res) {
            $json_data = array("result" => TRUE, "msg" => "Оголошення додано.");
        } else {
            $json_data = array("result" => FALSE, "msg" => "Виникла помилка. Спробуйте ще раз");
        }
        echo json_encode($json_data);
    }
    
    public function getAdverts($id) {
        $res = DB::query("SELECT * FROM adverts WHERE id_holder={$id} ORDER BY date DESC");
        return $res->fetch_all(MYSQLI_ASSOC);
    }
    
    public function getBookmarks($id) {
        $query = "SELECT * FROM adverts WHERE id IN (SELECT advertid FROM bookmarks WHERE userid={$id})";
        $res = DB::query($query);
        return $res->fetch_all(MYSQLI_ASSOC);
    }
    
    public function deleteAdvert($id) {
        $res1 = DB::query("DELETE FROM adverts WHERE id={$id}");
        $res2 = DB::query("DELETE FROM bookmarks WHERE advertid={$id}");
        return $res1;
    }

}
