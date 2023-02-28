<?php

namespace Game\Models;

class BaseModel
{
    public string $name = "New Thing";
    public string $id;
    public function __construct() {
        $this->id = uniqid(class_basename($this) . "::");
    }
}