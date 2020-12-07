<?php


namespace App\Services;


class MemCacheService
{
    protected static $arguments = [];

    public static function get()
    {
        return static::$arguments;
    }

    public static function set(...$arg)
    {
        array_push(static::$arguments, $arg);
    }
}