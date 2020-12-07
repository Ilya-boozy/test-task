<?php


namespace App\Services;


class CacheService
{
    protected $arguments = [];

    public function __construct(array $arguments = [1])
    {
        $this->arguments = $arguments;
    }

    public function get()
    {
        return $this->arguments;
    }

    public function set(...$arg)
    {
        array_push($this->arguments, $arg);
    }
}