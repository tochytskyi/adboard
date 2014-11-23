<?php


class AdvertFactory {
    
    public function createAdvert($model, $id, $title, $content, $type, $date) {
        switch ($type) {
            case 1: return new AdvertBuy($model, $id, $title, $content, $type, $date); 
            case 2: return new AdvertSale($model, $id, $title, $content, $type, $date); 
            case 3: return new AdvertExchange($model, $id, $title, $content, $type, $date); 

        }
    }
}
