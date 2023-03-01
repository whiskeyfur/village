<?php

namespace Game;

class Factory
{
    public function create($class, $count, $options = array())
    {
        $results = array();
        for ($x = 0; $x < $count; $x++) {
            $results[] = new $class(...$options);
        }
        return $results;
    }
}