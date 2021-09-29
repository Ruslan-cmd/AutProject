<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;
use App\Models\Pass;

class EmployeesSeeder extends Seeder
{

    public function run()
    {
        Employee::factory()->count(60)->create();
        // $this->assignPass($employees);
    }

}
