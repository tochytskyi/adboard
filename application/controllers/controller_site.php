<?php

// Main Controller


class Controller_Site extends Controller {

    public function __construct($model_name) {
        parent::__construct($model_name);
    }
    
    function action_index() {
        $this->view->setTitle("Main page");
        $this->view->generate('index_view.php', 'template_view.php');
    }

    function action_404() {
        $this->view->generate('404_view.php', 'template_view.php');
    }

    function action_user($params) {
        session_start();
        if (isset($_SESSION['user'])) {
            $data = $this->model->get_user($_SESSION['user']);
            $cards['cards'] = $this->model->getUserCards($_SESSION['user']);
            $data = array_merge($data, $cards);
            $data['title'] = "Пользователь";
            if (isset($params['deleteCardId'])) {
                $this->model->deleteCard($params['deleteCardId']);
                header("Location: ../user");
            }

            $this->view->generate('user_view.php', 'template_view.php', $data);
        } else {
            header("Location: login");
        }
    }

    function action_login() {
        session_start();
        if (!isset($_SESSION['user'])) {
            $data['title'] = "Вход";
            if (!isset($_POST['login'], $_POST['pwd'])) {
                $this->view->generate('login_view.php', 'template_view.php', $data);
            } else {
                $login = DB::esc($_POST['login']);
                $pwd = DB::esc($_POST['pwd']);
                if ($this->model->login($login, $pwd)) {
                    $_SESSION['user'] = $login;
                    $_SESSION['id'] = md5(uniqid(rand(), 1));
                    $json_data = array("result" => "OK", "login" => "true");
                    echo json_encode($json_data);
                } else {
                    $json_data = array("result" => "Не верный логин или пароль!", "login" => "false");
                    echo json_encode($json_data);
                }
            }
        } else {
            header("Location: user");
        }
    }

    function action_logout() {
        session_start();
        if (isset($_SESSION['user'])) {
            unset($_SESSION['login'], $_SESSION['id']);
            session_destroy();
            header("Location: login");
        }
    }

    function action_registration() {
        if (isset($_POST['name'])) {
            $userData = array(
                "name" => DB::esc($_POST['name']),
                "sername" => DB::esc($_POST['sername']),
                "login" => DB::esc($_POST['login']),
                "pwd" => DB::esc($_POST['pwd']),
                "email" => DB::esc($_POST['email']),
                "vk" => $_POST['vk']
            );

            if ($this->model->freeLogin($userData['login'])) {
                if ($this->model->addNewUser($userData)) {
                    $json_data = array("result" => "true");
                    $this->model->sendMailToUser($userData['email'], $userData['pwd'], $userData['login']);
                    if ($userData['vk']) {
                        session_start();
                        $_SESSION['user'] = $userData['login'];
                        $_SESSION['id'] = md5(uniqid(rand(), 1));
                    }
                } else {
                    $json_data = array("result" => "false");
                }
            } else {
                $json_data = array("result" => "Логин занят. Придумайте другой");
            }
            echo json_encode($json_data);
        } else {
            $data['title'] = "Регистрация";
            $this->view->generate('registration_view.php', 'template_view.php', $data);
        }
    }

    
    function action_search() {
        session_start();
        if (isset($_SESSION['user'])) {
            require_once __ROOT__ . '/models/Model_User.php';
            $model = new Model_User();
            $text = DB::esc($_POST['text']);
            $cards = $model->search($text, $_SESSION['user']);
            echo json_encode($cards);
        } else {
            header("Location: 404");
        }
    }

   

    function action_feedback() {
        if (isset($_POST['text'])) {
            $sended = $this->model->feedbackSend(DB::esc($_POST['name']), DB::esc($_POST['email']), $_POST['text']);
            if ($sended) {
                $json_data = array("result" => TRUE, "msg" => "Письмо отправлено. Мы ответим Вам в ближайшое время");
                echo json_encode($json_data);
            } else {
                $json_data = array("result" => FALSE, "msg" => "Ошибка отправки. Попробуйте еще раз!");
                echo json_encode($json_data);
            }
        } else {
            $data['title'] = "Обратная связь";
            $this->view->generate('feedback_view.php', 'template_view.php', $data);
        }
    }

}
