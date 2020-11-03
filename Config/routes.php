<?php

return array(
    'calendar/task/([0-9]+)' => 'task/view/$1',
    'calendar/task/create' => 'task/create',
    'calendar/task/delete/([0-9]+)' => 'task/delete/$1',

    'calendar/api/users' => 'api/readUsers',
    'calendar/api/user' => 'api/createUser',

    'calendar/api/tasks' => 'api/readTasks/$1',
    'calendar/api/task/create' => 'api/createTask/$1',

    'calendar/user/login' => 'user/login',
    'calendar/user/logout' => 'user/logout',

    'calendar/page-([0-9]+)' => 'calendar/index/$1',
    'calendar' => 'calendar/index',

);