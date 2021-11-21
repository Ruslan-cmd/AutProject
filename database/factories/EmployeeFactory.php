<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Pass;
use App\Models\PassNumber;

class EmployeeFactory extends Factory
{
    protected $model = Employee::class;
//задание полей для заполнения
    public function definition(): array
    {
        return [
            'full_name' => $this->faker->unique()->name
        ];
    }
//создались все таблицы, заполнились данными, создалась промиежуточная таблица
    public function withPassNumber()
    {
        return $this->hasAttached(PassNumber::factory());
    }
// на фоне созданных таблиц
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
//создание и присвоение нового номера пропуска
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
