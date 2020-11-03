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


    public function actionReadTasks() {
        self::setHeaders();

        if ($_SERVER['REQUEST_METHOD'] != 'GET') {
            http_response_code(400);
            return json_encode([
                'succcess' => false,
                'error' => 'К данном методу разрешены только GET запросы'
            ]);
        }

        $token = self::getToken();
        $userId = User::getUserByToken($token);

        if (!$userId) {
            http_response_code(401);
            return json_encode([
                'success' => false,
                'error' => 'Неверный токен'
            ]);
        }

        $createRespone = Task::getTaskList(1,$userId);

        if (!$createRespone) {
            http_response_code(400);
            return json_encode([
                'success' => false,
                'error' => 'Проверьте корректность запрос check request'
            ]);
        }

        http_response_code(200);
        echo json_encode($createRespone);
        return true;
    }

    public function actionCreateTask() {
        self::setHeaders();
        $token = self::getToken();

        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            http_response_code(400);
            echo json_encode([
                'success' => false,
                'error' => 'К методу разрешен доступ, лишь POST запросом',
            ]);
        }
        $userId = User::getUserByToken($token);

        if (!$userId) {
            http_response_code(401);
            return json_encode([
                'success' => false,
                'error' => 'Неверный токен'
            ]);
        }

        $data['title'] = $_POST['title'];
        $data['text'] = $_POST['text'];
        $data['created_date'] = $_POST['created_date'];
        $data['end_date'] = $_POST['end_date'];
        $data['user_id'] = $userId;
        
        $createResponse = Task::createTask($data);
        if (!is_numeric($createResponse) ) {
            http_response_code(400);
            echo json_encode([
                'success' => false,
                'error' => 'Поле название задачи не заполнено',
            ]);
        }

        http_response_code(201);
        echo json_encode([
            'status'    => true,
            'task_id'   => $createResponse,
        ]);
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

    private static function getToken() {
        if (isset($_GET)) {
           return $token = $_GET['token'];
        }
    }
}