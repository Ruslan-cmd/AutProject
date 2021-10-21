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
        PassNumber::factory()->count(20)->create();


        $this->createNewEmployeesWithSamePasses($employees);
        $this->assignPassNumber($employees);
    }

    private function createNewEmployeesWithSamePasses(Collection $employees)
    {
        $passNumbers = PassNumber::whereIn('id', $employees->pluck('id'))->get();

        foreach ($passNumbers as $passNumber) {
            Employee::factory()->for($passNumber)->create();
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
