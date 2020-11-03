<?php

class ApiController
{

    // Метод для получения всех пользователей 
    public function actionReadUsers() {
        self::setHeaders();

        if ($_SERVER['REQUEST_METHOD'] != 'GET') {
            http_response_code(400);
            echo json_encode([
                'success' => false,
                'error' => 'К методу разрешен доступ лишь GET запросом'
            ]);
        }

        $createRespone = User::getUserList();
        if (!$createRespone) {
            http_response_code(400);
            return json_encode([
                'success' => false,
                'error' => 'Проверьте корректность запроса'
            ]);
        }
        http_response_code(200);
        return json_encode($createRespone);
    }


        // Метод создания нового пользователя
    public function actionCreateUser() {
        self::setHeaders();

        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            http_response_code(400);
            return json_encode([
                'success' => false,
                'error' => 'К методу разрешен доступ, лишь POST запросом',
            ]);
        }

        $data['username'] = $_POST['username'];
        $data['token'] = self::generateToken($data);
        
        $createResponse = User::createUser($data);
        if (!is_numeric($createResponse) ) {
            http_response_code(400);
            return json_encode([
                'success' => false,
                'error' => 'Поле "Имя пользователя" - не заполнено',
            ]);
        }

        http_response_code(201);
        return json_encode([
            'status'    => true,
            'user_id'   => $createResponse,
            'token'     => $data['token'],
        ]);
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