<?php

namespace Game;

class Race
{
    public function getName() : string {
        return class_basename(__CLASS__);
    }
}