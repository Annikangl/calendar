<?php


class CalendarController
{


    public function actionIndex($page=1,$sorting = null) {
        
        $userId = User::checkLogin();
        if (isset($_GET['sort'])) {
            $sorting = $_GET['sort'];
            $taskList = [];
            $taskList = Task::getTaskBySort($sorting,$userId);
        } 
        elseif (isset($_GET['interval-sort'])) {
            $inputs['start_date'] = $_GET['start_date'];
            $inputs['end_date'] = $_GET['end_date'];
            $inputs['user_id'] = $userId;
            $taskList = [];
            $taskList = Task::getTaskByInterval($inputs,$page);
        }
        else {
            $taskList = [];
            $taskList = Task::getTaskList($page,$userId);
        }
        $total = Task::getTotalTask();

        $pagination = new Pagination($total,$page,Task::COUNT_ITEMS,'');
        
        require_once(ROOT . '/views/calendar/index.php');
        return true;
    }

    private function checkSorting() {

    }

}

// isset($_GET['sort']) ? $sorting = $_GET['sort'] : $sorting = null;