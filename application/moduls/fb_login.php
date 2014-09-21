<?php

require 'facebook/facebook.php';

$facebook = new Facebook(array(
            'appId' => '746125102111286',
            'secret' => 'f56b4a3a8ba31fa188a9d481224cab92',
            'cookie' => true
        ));

$session = $facebook->getSession();

if (!empty($session)) {
    # пробуем получить информацию о текущем пользователе
    try {
        $uid = $facebook->getUser();
        $user = $facebook->api('/me');
    } catch (Exception $e) {

    }

    if (!empty($user)) {
        # Выводим имя пользователя и проверям, есть ли такой пользователь в нашей БД
        $username = $user['name'];
        //$userdata = $model->userExist($username);
        if($model->userExist($username)){
            session_start();
            $_SESSION['id'] = $userdata['id'];
	    $_SESSION['face_id'] = $uid;
            $_SESSION['user'] = $userdata['user'];
            header("Location: user");
        }
    } else {
        die("Ошибка!");
    }
} else {
    # если сессия не активна - пытаемся залогиниться в facebook
    $login_url = $facebook->getLoginUrl();
    header("Location: " . $login_url);
}
    

?>