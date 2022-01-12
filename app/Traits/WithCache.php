<?php

namespace App\Traits;

use Illuminate\Support\Facades\Cache;

trait WithCache
{

    // protected static $cacheKey = '';

    /**
     *
     * Cache table Data
     */
    public static function cacheData($column = 'id')
    {
        return Cache::rememberForever(self::$cacheKey, function () use ($column) {
            return static::orderBy($column, 'desc')->get();
        });
    }

    /**
     *
     * Cache table Data
     */
    public static function cacheDataASC($column = 'id')
    {
        return Cache::rememberForever(self::$cacheKey . '_latest_', function () use ($column) {
            return static::orderBy($column, 'asc')->get();
        });
    }
    /**
     *
     * Cache table first Data
     */
    public static function cacheDataFirst()
    {
        return Cache::rememberForever(self::$cacheKey . '_first_', function () {
            return static::first();
        });
    }
    /**
     *
     * Cache table Last Data
     */
    public static function cacheDataLast()
    {
        return Cache::rememberForever(self::$cacheKey . '_last_', function () {
            return static::last();
        });
    }

    /**
     *
     * Cache table query
     */
    public static function cacheDataQuery($cacheKey, $query)
    {
        return Cache::rememberForever(self::$cacheKey . $cacheKey, function ($query) {
            return $query;
        });
    }
    /**
     *
     * Cache table cache
     */
    public static function forgetCache($cacheKey = null)
    {
        Cache::forget(self::$cacheKey);
        Cache::forget(self::$cacheKey . '_latest_');
        Cache::forget(self::$cacheKey . '_first_');
        Cache::forget(self::$cacheKey . '_last_');
        if ($cacheKey) {
            Cache::forget(self::$cacheKey . $cacheKey);
        }
    }
}
