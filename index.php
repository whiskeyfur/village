<?php
require "vendor/autoload.php";
require "src/autoload.php";

//$auth = new Leaf\Auth;
//$auth->autoConnect();
Leaf\View::attach(\Leaf\Blade::class);
app()->blade->configure("views/", "views/cache");

db()->connection(new PDO("sqlite:" . __DIR__ . "/data/website.db"));
cookie()->unsetAll();


app()->get('/', 'Home\HomeController@index');
if ($_SERVER["REMOTE_ADDR"] == "::1")
    app()->setErrorHandler(['\Leaf\Exception\General', 'defaultError']);

app()->run();