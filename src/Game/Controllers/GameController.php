<?php

namespace Game\Controllers;
use Leaf\ApiController;

class GameController
{
    public function index()
    {
        echo app()->blade->render('game/index', []);
    }
}