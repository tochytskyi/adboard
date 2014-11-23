<?php

class Model_Advert extends Model
{        
    
    public function getAdvert($id) {
        $res = DB::query("SELECT * FROM adverts WHERE id={$id}");
        $data = $res->fetch_all(MYSQLI_ASSOC);
        return $data[0];
    }
    
    public function addToBookmarks($id,$userid) {
        $res = DB::query("SELECT * FROM bookmarks WHERE advertid={$id} AND userid={$userid}");
        if($res->num_rows !== 0){
            $json_data = array("result" => TRUE, "msg" => "Оголошення вже у закладках");
            return json_encode($json_data);
        }
        $res->close();
        $res = DB::query("INSERT INTO bookmarks (advertid,userid) VALUES({$id},{$userid})");
        if ($res) {
            $json_data = array("result" => TRUE, "msg" => "Оголошення додано в закладки");
        } else {
            $json_data = array("result" => FALSE, "msg" => "Виникла помилка");
        }
        return json_encode($json_data);
    }

}
