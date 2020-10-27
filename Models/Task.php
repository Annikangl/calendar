<?php

class Task
{
    const COUNT_ITEMS = 5;

    public static function getTaskList($page) {
        $offset = ($page - 1) * self::COUNT_ITEMS;
        $db = Db::getConnection();
        $sql = "SELECT id, title, text, DATE(created_date) AS 'created_date', DATE(end_date) AS 'end_date' FROM tasks WHERE status = 1 LIMIT " . self::COUNT_ITEMS . " OFFSET $offset";
        $result = $db->query($sql);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getTaskBySort($sorting) {
        $db = Db::getConnection();
        $sql = "SELECT id, title, text, DATE(created_date) AS 'created_date', DATE(end_date) AS 'end_date' FROM tasks WHERE status = 1 ORDER BY end_date $sorting";
        $result = $db->query($sql);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getTaskById($taskId) {
        $db = Db::getConnection();
        $sql = "SELECT * FROM tasks WHERE id=:id";
        $result = $db->prepare($sql);
        $result->execute([':id' => $taskId]);
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public static function getTaskByInterval(array $inputs, $page) {
        $db = Db::getConnection();
        $sql = "SELECT * FROM `tasks` WHERE end_date BETWEEN :start_date AND :end_date";
        $result = $db->prepare($sql);
        $result->execute(
            [
                'start_date' => $inputs['start_date'],
                'end_date' => $inputs['end_date']
            ]
            );
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getTotalTask() {
        $db = Db::getConnection();
        $sql = "SELECT COUNT(id) as count FROM tasks WHERE status = 1";
        $result = $db->query($sql);
        $row = $result->fetch(PDO::FETCH_ASSOC);
        return $row['count'];
    }

    public static function createTask(array $fields) {
        $db = Db::getConnection();
        $sql = "INSERT INTO `tasks` (title,text,created_date,end_date) 
                VALUES (:title, :text, :created_date, :end_date)";
        $result = $db->prepare($sql);
        $result->execute(
            [
            'title' => $fields['title'],
            'text' => $fields['text'],
            'created_date' => $fields['created_date'],
            'end_date' => $fields['end_date'],
            ]
        );
        return $result;
    }

    public static function deleteTaskById($taskId) {
        $db = Db::getConnection();
        $sql = "DELETE FROM tasks WHERE id = :id";
        $result = $db->prepare($sql);
        return $result->execute(['id' => $taskId]);
    }
}