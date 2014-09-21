<?php

$login = $_POST['login'];
$json_data = array('login' => $login);
echo json_encode($json_data);

