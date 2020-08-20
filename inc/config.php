<?php

//Autoloader Classses
function autoloader($class_name){
    foreach(glob(__DIR__ . '/*', GLOB_ONLYDIR) AS $dir){
        if (file_exists("$dir/" . $class_name . '.php')) {
            require_once "$dir/" . $class_name . '.php';
            break;
        }
    }
}

//Regiter function autoloader
spl_autoload_register('autoloader');



