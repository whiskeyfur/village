<?php
$url = parse_url($_SERVER["REQUEST_URI"]);
if (file_exists(__DIR__ . "{$url["path"]}"))
    return false;
error_log(sprintf("from: %s [%s:%d]", __METHOD__ , __FILE__ , __LINE__));
require_once "index.php";