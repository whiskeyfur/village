<?php

namespace Game;
use Game\Factory;
use Leaf\ApiController;

class GameController implements \BaseController
{
    public function index()
    {
        echo app()->blade->render('game/index', [
            "people" => (new Factory)->create('\Game\Person', 100)
        ]);
    }
}