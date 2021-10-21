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
            'pass_id' => Pass::factory(),
            'card_number' => $this->faker->numberBetween(10000, 100000),
            'system_number' => $this->faker->numberBetween(10000, 100000),
            'is_active' => $this->faker->numberBetween(0, 1)
        ];
    }
}
