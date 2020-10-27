<?php
include_once(ROOT . '/Models/Task.php');
include_once(ROOT . '/includes/Pagination.php');

class CalendarController
{

    // TODO: разобрать эту кашу по методам

    public function actionIndex($page=1,$sorting = null) {
        if (isset($_GET['sort'])) {
            $sorting = $_GET['sort'];
            $taskList = [];
            $taskList = Task::getTaskBySort($sorting);
        } 
        elseif (isset($_GET['interval-sort'])) {
            $inputs['start_date'] = $_GET['start_date'];
            $inputs['end_date'] = $_GET['end_date'];
            $taskList = [];
            $taskList = Task::getTaskByInterval($inputs,$page);
        }
        else {
            $taskList = [];
            $taskList = Task::getTaskList($page);
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