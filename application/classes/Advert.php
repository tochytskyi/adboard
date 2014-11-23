<?php

abstract class Advert {
    static function typeName($id) {
        switch ($id) {
            case 1: return "Куплю";
            case 2: return "Продам";
            case 3: return "Обміняю";

            default: return "Куплю";
        }
    }
}
