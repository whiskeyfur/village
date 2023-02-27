<?php

namespace Home;
class HomeController
{
    public function index()
    {
        echo app()->blade->render('index', ['name' => 'Michael Darko']);
    }
}