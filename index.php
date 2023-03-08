<?php
require "vendor/autoload.php";
require "src/autoload.php";

use Leaf\Database;

Leaf\View::attach(\Leaf\Blade::class);
app()->blade->configure("views/", "views/cache");

Leaf\Config::set([
    'log.enabled' => true,
    'log.dir' => __DIR__ . '/logs/',
    'log.file' => date("Ymd") . '_crash_logs.log',
]);

app()->config(['debug' => in_array($_SERVER["SERVER_NAME"], ["localhost", "0.0.0.0"])]);
app()->setErrorHandler(['\Leaf\Exception\General', 'defaultError']);
app()->set404(function() {
    echo app()->blade->render('home/missing', []);
});

app()->get('/', 'Home\HomeController@index');

app()->run();