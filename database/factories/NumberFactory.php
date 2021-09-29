<?php

namespace Database\Factories;

use App\Models\Number;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Pass;
class NumberFactory extends Factory
{

    protected $model = Number::class;

    public function definition()
    {
        $passes = Pass::inRandomOrder()->first();
        return [
            'card_number' => $this->faker->numberBetween(10000, 100000),
            'system_number' => $this->faker->numberBetween(10000, 100000),
            'status' => $this->faker->numberBetween(0, 1),
            'pass_id' => $passes
        ];
    }
}
