<?php

if (preg_match('#^([^?]+)&(.*)#', $_SERVER["REQUEST_URI"], $matches)) {
    $_SERVER["REQUEST_URI"] = $matches[1];
    if (isset($_SERVER["QUERY_STRING"]))
        $_SERVER["QUERY_STRING"] .= "&" . $matches[2];
    else
        $_SERVER["QUERY_STRING"] = $matches[2];
};

$url = parse_url($_SERVER["REQUEST_URI"]);

if (file_exists(__DIR__ . $url["path"]))
    return false;

require_once "index.php";