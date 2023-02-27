<?php
spl_autoload_register(function($class) {
    $classname = str_replace("\\", "/", $class);
    if (!file_exists(__DIR__ . "/$classname.php")) return false;
    require_once __DIR__ . "/$classname.php";
    return true;
});