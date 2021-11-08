<?php

namespace Database\Factories;

use App\Models\PassNumber;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Pass;
use Illuminate\Foundation\Testing\WithFaker;

class PassNumberFactory extends Factory
{
    use WithFaker;

    protected $model = PassNumber::class;

    public function definition(): array
    {
        return [
            'card_number' => $this->faker->unique()->numberBetween(10000, 100000),
            'system_number' => $this->faker->unique()->numberBetween(10000, 100000),
            'is_active' => true,
            'pass_id' => Pass::factory()
        ];
    }
}
