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
        $response = $this->get('/showFormForCreatingNewPass');
        $response->assertStatus(200);
        $response = $this->get('/showFormDeletePass');
        $response->assertStatus(200);
        $response = $this->get('/showFormFiredEmployee');
        $response->assertStatus(200);
        $response = $this->get('/showFormCreateNewEmployee');
        $response->assertStatus(200);
    }

    public function test_interacting_with_headers()
    {
        $response = $this->post('/sendId', ['id' => '12']);

        $response->assertStatus(200);
    }
}

