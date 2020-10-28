<?php
// Автозагрузка классов

spl_autoload_register(function ($class_name) {
    $array_paths = [
        '/models/',
        '/includes/',
    ];

    foreach ($array_paths as $path){
        $path = ROOT. $path . $class_name . '.php';
        if(is_file($path)){
            include_once $path;
        }
    }
});