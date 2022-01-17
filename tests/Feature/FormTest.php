<?php

namespace Tests\Feature;

use Database\Factories\UserFactory;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Contracts\Auth\Authenticatable;
class FormTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
      $user = new User;
      auth()->login($user);
        $response = $this->actingAs($user,'web')
            ->withSession(['email' => 'ruslantelenkov@mail.ru'])
            ->get('/');
    }

}
