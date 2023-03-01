<?php

namespace Game;

class Config implements \ArrayAccess
{

    private static mixed $data;

    public function __construct() {
        static::$data = json_decode(file_get_contents(dirname(dirname(__dir__)) . "/data/config.json"), true);
    }

    public static function get(string $string, $default = null)
    {
        return static::$data[$string] ?? $default;
    }

    public function offsetExists(mixed $offset): bool
    {
        return isset($this->data[$offset]);
    }

    public function offsetGet(mixed $offset)
    {
        return static::$data[$offset];
    }

    public function offsetSet(mixed $offset, mixed $value)
    {
        throw new \Exception("Config is read only");
    }

    public function offsetUnset(mixed $offset)
    {
        throw new \Exception("Config is read only");
    }
}