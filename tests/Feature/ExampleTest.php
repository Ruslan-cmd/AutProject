<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);

    }
    public function testAuthorize(){

        $response = $this ->post('/login',[
            'email' => 'ruslantelenkov@mail.ru',
            'password' => '111111',
        ]);
    $response = $this->get('/showHistoryForm');
    $response->assertUnauthorized();
    }
}
