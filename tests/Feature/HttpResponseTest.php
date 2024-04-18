<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HttpResponseTest extends TestCase
{
    public function test_the_application_returns_correct_response_status()
    {
        $response = $this->get('/');
        $response->assertStatus(403);

        $response = $this->get('/?size=');
        $response->assertStatus(403);

        $response = $this->get('/?size=0');
        $response->assertStatus(403);

        $response = $this->get('/?size=1');
        $response->assertStatus(200);

        $response = $this->get('/?size=50');
        $response->assertStatus(200);

        $response = $this->get('/?size=100');
        $response->assertStatus(200);

        $response = $this->get('/?size=101');
        $response->assertStatus(403);

        $response = $this->get('/?size=test');
        $response->assertStatus(403);
    }
}
