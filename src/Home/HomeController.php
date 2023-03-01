<?php

namespace Home;
use Leaf\ApiController;

class HomeController implements \BaseController
{
    public function index()
    {
        echo app()->blade->render('home/index', []);
    }
}