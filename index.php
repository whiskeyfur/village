<?php
require "vendor/autoload.php";
require "src/autoload.php";

use Leaf\Database;
use Game\Game;

//$auth = new Leaf\Auth;
//$auth->autoConnect();
Leaf\View::attach(\Leaf\Blade::class);
app()->blade->configure("views/", "views/cache");

Leaf\Config::set([
    'log.enabled' => true,
    'log.dir' => __DIR__ . '/logs/',
    'log.file' => date("Ymd") . '_crash_logs.log',
]);

app()->config(['debug' => in_array($_SERVER["REMOTE_ADDR"], ["::1", "127.0.0.1"])]);
app()->setErrorHandler(['\Leaf\Exception\General', 'defaultError']);
app()->set404(function() { echo app()->blade->render('home/missing', []); });

app()->mount('/game', function () {
    app()->get('/', 'Game\GameController@index');
    app()->get('/test', function() { print_r(new \Game\Person()); });
});

app()->mount('/debug', function() {
    app()->get('/', 'Debug\DebugController@index');
    app()->get('/classes', function() { print "<pre>"; print_r(get_declared_classes()); });
});

app()->get('/', 'Home\HomeController@index');
app()->run();


