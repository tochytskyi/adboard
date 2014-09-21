<?php

class DB {

    private static $instance;
    private $MySQLi;

    private function __construct() {

        $this->MySQLi = new mysqli(DBConfig::HOST, DBConfig::USER, DBConfig::PASS, DBConfig::DBNAME);

        if (mysqli_connect_errno()) {
            throw new Exception('Database error '. mysqli_connect_error().'. Please, try again later.');
        }

        $this->MySQLi->set_charset("utf8");
    }

    public static function init() {
        if (self::$instance instanceof self) {
            return false;
        }

        self::$instance = new self();
    }

    public static function getMySQLiObject() {
        return self::$instance->MySQLi;
    }

    public static function query($q) {
        return self::$instance->MySQLi->query($q);
    }

    public static function esc($str) {
        return self::$instance->MySQLi->real_escape_string(htmlspecialchars($str));
    }

    public static function quote($value) {
        if (!is_numeric($value)) {
            $value = "'" . mysql_real_escape_string($value) . "'";
        }
        return $value;
    }
    
    public function sqlPtotect($str){
        if(strpos($str, "SELECT") ||
           strpos($str, "LIKE") ||
           strpos($str, "OR") ||
           strpos($str, "AND") ||
           strpos($str, "UPDATE") ||
           strpos($str, "DELETE") ||
           strpos($str, "FROM") ||
           strpos($str, "AS") 
        ){
            return FALSE;
        }else{
            return TRUE;
        }
    }

}

?>