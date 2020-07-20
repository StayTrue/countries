<?php

namespace App;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

class CountryHelper
{
    /**
     * Redis storage key
     */
    public const REDIS_KEY = 'countries:';

    /**
     * Time for cache living
     */
    protected const CACHE_LIFETIME_MINUTES = 1;

    /**
     * Get all countries statistic
     *
     * @return array
     */
    public static function all()
    {
        $countries = [];

        $countries = Cache::remember(self::REDIS_KEY . "cache", self::CACHE_LIFETIME_MINUTES, function() {
            $finalArray = [];
            $keys = Redis::keys(self::REDIS_KEY . "*");

            foreach ($keys as $key => $value) {
                $finalArray[explode(":", $value)[1]] = Redis::get($value);
            }

            return $finalArray;
        });

        return $countries;
    }
}
