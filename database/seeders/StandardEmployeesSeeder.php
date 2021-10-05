<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Pass;
use Illuminate\Database\Seeder;

class StandardEmployeesSeeder extends Seeder
{

    public function run()
    {
        Employee::factory()->count(30)->create();
    }
}
