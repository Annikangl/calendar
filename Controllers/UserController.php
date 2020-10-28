<?php

class UserController
{
    // Метод для авторизации пользователя
    public function actionLogin() {
        $username = '';
        $token = '';

        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $token = $_POST['token'];

            $errors = false;

            $user = User::checkUserData($username,$token);
            if ($user) {
                User::auth($user);
                header("Location: /calendar");
            } else {
                $errors[] = "Неверные данные для входа";
            }
        }
        require_once(ROOT . "/Views/user/login.php");
        return true;
    }

    public function actionLogout() {
        session_destroy();
        header("Location: /calendar/user/login");
        return true;
    }
}