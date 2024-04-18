<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Support\Facades\Cache;
use App\Services\MultiplicationCacheService;

class CacheTest extends TestCase
{
    public function test_cache_has_key_works() {
        Cache::flush();

        Cache::add('1x2', 2);
        Cache::add('10x10', 100);

        $this->assertTrue(MultiplicationCacheService::checkIfResultExists(1, 2));
        $this->assertTrue(MultiplicationCacheService::checkIfResultExists(10, 10));

        $this->assertFalse(MultiplicationCacheService::checkIfResultExists(2, 4));

        Cache::flush();
    }

    public function test_cache_add_works() {
        Cache::flush();

        MultiplicationCacheService::add(2, 2);
        MultiplicationCacheService::add(4, 4);

        $this->assertTrue(Cache::has('2x2'));
        $this->assertTrue(Cache::has('4x4'));

        $this->assertFalse(Cache::has('10x10'));

        Cache::flush();
    }

    public function test_cache_get_works() {
        Cache::flush();

        Cache::add('7x15', 105);
        Cache::add('21x43', 903);

        $this->assertEquals(105, MultiplicationCacheService::get(7, 15));
        $this->assertEquals(105, MultiplicationCacheService::get(15, 7));
        $this->assertEquals(903, MultiplicationCacheService::get(21, 43));
        $this->assertEquals(903, MultiplicationCacheService::get(43, 21));

        $this->assertNull(MultiplicationCacheService::get(8, 16));
        $this->assertNull(MultiplicationCacheService::get(16, 8));

        Cache::flush();
    }

    public function test_cache_create_key_works() {
        $this->assertEquals('3x7', MultiplicationCacheService::testableCreateKey(3, 7));
        $this->assertEquals('3x7', MultiplicationCacheService::testableCreateKey(7, 3));
    }
}
