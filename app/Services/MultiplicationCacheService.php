<?php
namespace App\Services;

use Illuminate\Support\Facades\Cache;

class MultiplicationCacheService {
    public static function checkIfResultExists($multiplicand, $multiplier) {
        $key = self::createKey($multiplicand, $multiplier);
        return Cache::has($key);
    }

    public static function add($multiplicand, $multiplier) {
        Cache::add(self::createKey($multiplicand, $multiplier), $multiplicand*$multiplier);
    }

    public static function get($multiplicand, $multiplier) {
        return Cache::get(self::createKey($multiplicand, $multiplier));
    }

    protected static function createKey($multiplicand, $multiplier) {
        $arr = [$multiplicand, $multiplier];
        sort($arr);
        return implode('x', $arr);
    }

    public static function testableCreateKey($multiplicand, $multiplier) {
        return self::createKey($multiplicand, $multiplier);
    }
}
