<?php

namespace Game;

class BaseModel
{
    public string $id;

    /**
     * @throws \Exception
     */
    public function __construct() {
        $this->id = bin2hex(random_bytes(16));
    }
}