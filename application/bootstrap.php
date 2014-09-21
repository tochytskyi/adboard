<?php

define('__ROOT__', dirname(__FILE__));

function __autoload($class_name) {
    include __ROOT__."/classes/".$class_name . '.php';
}

function error($msg){
    die("<br/><center><h2 style='color:red'>".$msg."</h2></center>");
}

// подключаем файлы ядра
require_once 'core/model.php';
require_once 'core/view.php';
require_once 'core/controller.php';

require_once 'config.php';

require_once 'core/route.php';
Route::start(); // запускаем маршрутизатор
