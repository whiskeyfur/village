<?php

class View
{
    public function __construct(string $filepath) {
        if (!file_exists($filepath)) throw new InvalidArgumentException("File not found: $filepath");

    }
}