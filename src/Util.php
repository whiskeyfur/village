<?php

class Util
{
    public static function Pick(array $ary, int $count = 1) {
        return array_rand(array_flip($ary), $count);
    }
}