<?php
define('ROOT', "http://adboard");
error_reporting(8191);
function errorHandler($errno, $errstr, $errfile, $errline) {
        if ($errno == E_ERROR ||
                $errno == E_PARSE ||
                $errno == E_CORE_ERROR ||
                $errno == E_COMPILE_ERROR ||
                $errno == E_USER_ERROR
           ){
               //error_log($errno."/".$errstr."/".$errfile."/".$errline, 3, "../errors.log");
               die("Извините за неудобства. На сайте возникла ошибка.");
            }
        return true;
    }
set_error_handler('errorHandler');

require_once 'application/bootstrap.php';
 