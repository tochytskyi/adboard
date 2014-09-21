<?php
define('__ROOT__', dirname(dirname(__FILE__))); 
require_once __ROOT__."\config.php";

if(isset($_POST['name'])) {
    $name = mysql_escape_string($_POST['name']);
}
if(isset($_POST['sername'])){
    $sername = mysql_escape_string($_POST['sername']);
}
if(isset($_POST['mail'])){
    $mail = mysql_escape_string($_POST['mail']);
}
if(isset($_POST['pwd'])){
    $pwd = mysql_escape_string($_POST['pwd']);
    $pwd_hash = sha1($pwd);
}
if(isset($_POST['location'])){
    $location = mysql_escape_string($_POST['location']);
}
if(isset($_POST['gender'])){
    $gender = $_POST['gender'];
}
if(isset($_POST['birthday'])) $birthday = $_POST['birthday'];



$query = "INSERT INTO users (name, sername, email, pwd, location, gender, birthday) "
        . "VALUES('$name','$sername','$mail','$pwd_hash','$location','$gender','$birthday')";
if (mysqli_query($link, $query)) {
    $data = "success";
} else {
    $data = "fail";
}
mysqli_close($link);

echo $data;


