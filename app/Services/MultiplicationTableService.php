<?php
namespace App\Services;

use App\Services\MultiplicationCacheService;

class MultiplicationTableService {
    public static function createTableForGivenSize(int $size): array {
        $table = [];
        for ($multiplicand=1; $multiplicand <= $size; $multiplicand++) {
            for ($multiplier=1; $multiplier <= $size; $multiplier++) {
                $table[$multiplicand][$multiplier] = self::calculate($multiplicand, $multiplier);
            }
        }
        return $table;
    }

    public static function calculate($multiplicand, $multiplier) {
        if (MultiplicationCacheService::checkIfResultExists($multiplicand, $multiplier)) {
            return (int) MultiplicationCacheService::get($multiplicand, $multiplier);
        } else {
            MultiplicationCacheService::add($multiplicand, $multiplier);
            return $multiplicand*$multiplier;
        }
    }
}
