<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RouteTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_route()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response = $this->get('/resetPassword');
        $response->assertStatus(200);
    }

    public function test_interacting_with_headers()
    {

        $response = $this->post('/sendId', ['id' => '1']);
        $response->assertStatus(405);
        $response = $this->post('/sendId', ['id' => 'test']);
        $response->assertStatus(302);

    }
}

