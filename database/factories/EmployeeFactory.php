<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Pass;

class EmployeeFactory extends Factory
{
    protected $model = Employee::class;

    public function definition(): array
    {

        return [
            'full_name' => $this->faker->name,
            'pass_id' => Pass::factory()
        ];
    }
}
