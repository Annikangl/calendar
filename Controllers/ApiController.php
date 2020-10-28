<?php

class ApiController
{

    // Метод для получения всех пользователей 
    public function actionRead() {
        self::setHeaders();

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            http_response_code(200);
            $usersList = User::getUserList();
            if ($usersList) {
                echo json_encode($usersList);
            }
        } else {
            http_response_code(400);
        }
        
        return true;
    }



    // Метод создания нового пользователя
    public function actionCreate() {
        self::setHeaders();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data['username'] = $_POST['username'];
            $data['token'] = self::generateToken($data);
            $lastId = User::createUser($data);
            $token = User::getUserById($lastId);
            if ($lastId) {
                http_response_code(201);
                $response = [
                    'status' => true,
                    'user_id' => $lastId,
                    'token' => $token['token']
                ];
                echo json_encode($response);
            }
        }
        http_response_code(400);
        return true;
    }


    private static function setHeaders() {
        return [
            header("Access-Control-Allow-Origin: *"),
            header("Content-Type: application/json; charset=UTF-8"),
            header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE"),
            header("Access-Control-Max-Age: 3600"),
            header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With")
        ];
    }

    private static function generateToken($data) {
        return md5($data['username'] . date('d.m.Y') . 'salt');
    }
}