<?php

class User
{
    public static function createUser(array $data) {
        $db = Db::getConnection();
        $sql = "INSERT INTO `users` (username,token) 
                VALUES (:username, :token)";
        $result = $db->prepare($sql);
        $result->execute(
            [
            'username' => $data['username'],
            'token' => $data['token'],
            ]
        );
        return $db->lastInsertId();
    }

    public static function getUserList() {
        $db = Db::getConnection();
        $sql = "SELECT * FROM users ORDER BY id";
        $result = $db->query($sql);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getUserById($userId) {
        $id = intval($userId);

        $db = Db::getConnection();
        $sql = "SELECT * FROM users WHERE id=:id";
        $result = $db->prepare($sql);
        $result->execute([':id' => $userId]);
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public static function getUserByToken($token) {
        $db = Db::getConnection();
        $sql = "SELECT id FROM users WHERE token=:token";
        $result = $db->prepare($sql);
        $result->execute(['token' => $token]);
        $user = $result->fetch(PDO::FETCH_ASSOC);
        return $user['id'];
    }

    public static function checkUserData($username,$token) {
        $db = Db::getConnection();
        $sql = "SELECT * FROM users WHERE username=:username AND token=:token";
        $result = $db->prepare($sql);
        $result->execute([
            'username' => $username,
            'token' => $token
            ]);
        if ($result->rowCount() != 0) {
            return $result->fetch(PDO::FETCH_ASSOC);

        }
        return false;
    }

    public static function auth($user) {
        session_start();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['token'] = $user['token'];
    }

    public static function checkLogin() {
        if (isset($_SESSION['user_id'])) {
            return $_SESSION['user_id'];
        }
        header("Location: /calendar/user/login");
    }
}