<?php

return array(
    'calendar/task/([0-9]+)' => 'task/view/$1',
    'calendar/task/create' => 'task/create',
    'calendar/task/delete/([0-9]+)' => 'task/delete/$1',

    'calendar/page-([0-9]+)' => 'calendar/index/$1',
    'calendar' => 'calendar/index',

);