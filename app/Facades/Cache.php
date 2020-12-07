<?php


namespace App\Facades;


use App\Services\CacheService;
use Illuminate\Support\Facades\Facade;

/**
 * Class Cache
 * @method static string get()
 * @method static string set(...$args)
 *
 * @see CacheService
 * @package App\Facades
 */
class Cache extends Facade
{
    protected static function getFacadeAccessor()
    {
        return CacheService::class;
    }
}