<?php

namespace Home\Controllers;
use Leaf\ApiController;

class HomeController
{
    public function index()
    {
        echo app()->blade->render('home/index', []);
    }
}