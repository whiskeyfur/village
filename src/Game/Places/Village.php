<?php

namespace Game\Races;

class Village implements Place
{
    public string $name;

    public function __construct()
    {
        $this->name = "New Village";
    }

    public function getName(): string
    {
        return $this->name;
    }
}