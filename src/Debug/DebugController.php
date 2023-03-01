<?php

namespace Debug;
use Leaf\ApiController;

class DebugController implements \BaseController
{
    public function index()
    {
        echo app()->blade->render('debug/index', []);
    }
}