<?php

// Отображение ошибок

ini_set('display_errors',1);
error_reporting(E_ALL);


const ROOT = __DIR__;
require_once(ROOT . "/includes/Autoload.php");
session_start();

$router = new Router();
$router->run();
