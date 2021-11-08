<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Pass;
use App\Models\PassNumber;
use Illuminate\Database\Seeder;

class StandardEmployeesSeeder extends Seeder
{

    public function run()
    {
        PassNumber::factory()->count(30)->create();
        $employees = Employee::factory()->count(30)->create();
        $this->assignPassNumber($employees);
    }

    public function assignPassNumber($employees)
    {
        foreach ($employees as $employee) {

            $numbers = PassNumber::query()->inRandomOrder()->limit(rand(1, 3))->get();
            $employee->passNumbers()->sync($numbers);
        }
    }
}

