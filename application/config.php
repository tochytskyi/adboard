<?php

class DBConfig{
    const HOST = "localhost";
    const PASS = "root";
    const USER = "root";
    const DBNAME = "cards";
}


try{
    DB::init();

}catch (Exception $e){
    error($e->getMessage());
}

 