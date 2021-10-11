<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\PassNumber;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;

class EmployeesWithLostPassesSeeder extends Seeder
{
    public function run()
    {
        $employees = Employee::factory()->count(30)->create();

        $this->markPassNumbersAsInactive($employees);

        $this->createNewNumberForPasses($employees);
    }

    private function markPassNumbersAsInactive(Collection $employees)
    {
        $passIds = $employees->pluck('pass_id'); //извлечение значений по ключу

        PassNumber::whereIn('pass_id', $passIds)->update(['is_active' => false]); //проверка что значения столбца pass_id содержатся в массиве, далее перевод статуса
    }

    private function createNewNumberForPasses(Collection $employees)
    {
        /** @var Employee $employee */
        foreach ($employees as $employee) {
            PassNumber::factory()->for($employee->pass, 'pass')->create();
        }
    }
}
