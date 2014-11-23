<?php

define(TPL_DIR, "application/views");

class DBConfig{
    const HOST = "localhost";
    const PASS = "root";
    const USER = "root";
    const DBNAME = "board";
}


try{
    DB::init();

}catch (Exception $e){
    error($e->getMessage());
}

 