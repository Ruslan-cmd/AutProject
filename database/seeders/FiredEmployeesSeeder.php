<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Pass;
use App\Models\PassNumber;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;

class FiredEmployeesSeeder extends Seeder
{
    public function run()
    {
        $employees = Employee::factory()->count(10)->create();

        $this->createNewEmployeesWithSamePasses($employees);
        $this->assignPassNumber($employees);
    }

    private function createNewEmployeesWithSamePasses(Collection $employees)
    {
        $passes = Pass::whereIn('id', $employees->pluck('pass_id'))->get();

        foreach ($passes as $pass) {
            Employee::factory()->for($pass)->create();
        }
    }

    public function assignPassNumber($employees)
    {
        foreach ($employees as $employee) {
            $numbers = PassNumber::query()->get();
            $employee->passNumbers()->sync($numbers);
        }
    }
}
