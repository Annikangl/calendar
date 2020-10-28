<?php



class TaskController
{
    public function actionView($taskId) {
        $taskId = intval($taskId);
        $taskItem = [];
        $taskItem = Task::getTaskById($taskId);
        require_once(ROOT . '/views/task/task.php');
        return true;
    }

    public function actionCreate() {
        $createTask = '';
        if (isset($_POST['submit'])) {
            $fields['title'] = $_POST['task__title'];
            $fields['text'] = $_POST['task__text'];
            $fields['created_date'] = $_POST['created__date'];
            $fields['end_date'] = $_POST['end__date'];
            $fields['user_id'] = $_SESSION['user_id'];

            // посдатвляется текущая дета, если не задать дату начала задачи
            if ($fields['created_date'] == false) {
                $fields['created_date'] = date('Y-m-d H:i:s');
            }

            $createTask = Task::createTask($fields);
        }

        require_once(ROOT .'/views/task/create.php');
        return true;
    }

    public function actionDelete($taskId) {
        if ($taskId) {
            $taskId = intval($taskId);
            Task::deleteTaskById($taskId);
            header("Location: /calendar");
        }
        return true;
    }
}