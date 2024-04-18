<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Services\MultiplicationTableService;
use Illuminate\Support\Facades\Cache;

class MultiplicationTableTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_multiplication_table_calculate_works(): void
    {
        $tests = [
            [
                [1,5],
                5
            ],
            [
                [23,7],
                161
            ],
            [
                [50,50],
                2500
            ]
        ];

        Cache::flush();

        foreach ($tests as $test) {
            $this->assertEquals($test[1], MultiplicationTableService::calculate($test[0][0], $test[0][1]));
        }
    }
}
