<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Pass;
use App\Models\PassNumber;

class EmployeeFactory extends Factory
{
    protected $model = Employee::class;

    public function definition(): array
    {
        return [
            'full_name' => $this->faker->unique()->name
        ];
    }

    public function withPassNumber()
    {
        return $this->hasAttached(PassNumber::factory());
    }

    public function withLostPass()
    {
        return $this->withPassNumber()->afterCreating(function (Employee $employee) {
            $employee->passNumbers()->update([
                'is_active' => false
            ]);

            foreach ($employee->passNumbers as $passNumber) {
                $employee->passNumbers()->updateExistingPivot($passNumber, [
                    'deleted_at' => now()
                ]);
            }

            $employee->passNumbers()->attach(PassNumber::factory()->create());
        });
    }

    public function fired()
    {
        return $this->withPassNumber()->afterCreating(function (Employee $employee) {
            foreach ($employee->passNumbers as $passNumber) {
                $employee->passNumbers()->updateExistingPivot($passNumber, [
                    'deleted_at' => now()
                ]);

                $employee->update([
                    'fired_at' => now()
                ]);
            }
        });
    }
}
