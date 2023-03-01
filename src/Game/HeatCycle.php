<?php

namespace Game;

class HeatCycle
{

    public int $length = 30;
    public int $starts;
    public int $strength;
    public int $duration;

    public function __construct()
    {
        $this->starts = random_int(8,13);
        $this->duration = 30;
        $this->strength = 0;
    }
}