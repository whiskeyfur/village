<?php

namespace Home;

class HomeController
{
    public function index()
    {
        echo file_get_contents(__DIR__ . "/views/index.php");
        //app()->blade->render('home/index', []);
    }
    public function missing()
    {
        echo file_get_contents(__DIR__ . "/views/missing.php");
        //echo app()->blade->render('home/missing', []);
    }
    public function error()
    {
        echo file_get_contents(__DIR__ . "/views/error.php");
        //echo app()->blade->render('home/error', []);
    }
}