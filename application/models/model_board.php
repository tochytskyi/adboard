<?php

class Model_Board extends Model
{        
          
    public function getCategoryName($id) { 
        $res = DB::query("SELECT name FROM category WHERE id={$id}");
        $row = $res->fetch_assoc();
        return $row["name"];
    }
    
    public function getCategoryDescription($id) { 
        $res = DB::query("SELECT description FROM category WHERE id={$id}");
        $row = $res->fetch_assoc();
        return $row["description"];
    }
    
    public function getCategoryAdvertsList($id) { 
        $res = DB::query("SELECT * FROM adverts WHERE category_id={$id}");
        $list = $res->fetch_all(MYSQLI_ASSOC);
        $adverts = array();
        $factory = new AdvertFactory();
        foreach ($list as $advert) {
            $adverts[] = $factory->createAdvert($this, $advert["id"], $advert["title"], $advert["content"], $advert["type"], $advert["date"]);  
            
        }
        return $adverts;
    }
    
    public function getAdvertAuthor($id) {
        $res = DB::query("SELECT id_holder FROM adverts WHERE id={$id}");
        $row = $res->fetch_assoc();
        return $row["id_holder"];
    }

}
