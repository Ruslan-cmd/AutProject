<?php

namespace Database\Factories;

use App\Models\PassNumber;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Pass;
class PassNumberFactory extends Factory
{

    protected $model = PassNumber::class;
public function addNumber(){

    return Pass::factory();

}

    public function definition()
    {
       //$passes = Pass::inRandomOrder()->first();
        return [
            'card_number' => $this->faker->numberBetween(10000, 100000),
            'system_number' => $this->faker->numberBetween(10000, 100000),
            'status' => $this->faker->numberBetween(0, 1),
            'pass_id' => Pass::factory()->afterCreating($this->addNumber())
        ];
    }
}
