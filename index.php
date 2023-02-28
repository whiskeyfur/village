<?php
require "vendor/autoload.php";
require "src/autoload.php";

use Leaf\Database;

//$auth = new Leaf\Auth;
//$auth->autoConnect();
Leaf\View::attach(\Leaf\Blade::class);
app()->blade->configure("views/", "views/cache");


Leaf\Config::set([
    'log.enabled' => true,
    'log.dir' => __DIR__ . '/logs/',
    'log.file' => date("Ymd") . '_crash_logs.log',
]);

//cookie()->unsetAll();

app()->setErrorHandler(['\Leaf\Exception\General', 'defaultError']);
app()->set404(function() {
    echo app()->blade->render('home/missing', []);
});

if (in_array($_SERVER["REMOTE_ADDR"], ["::1", "127.0.0.1"])) {
    app()->config(['debug' => true]);
} else {
    app()->config(['debug' => false]);
}

app()->get('/', 'Home\Controllers\HomeController@index');
app()->get('/test', function() {
    print_r(new \Game\Models\Person());
});
app()->run();

