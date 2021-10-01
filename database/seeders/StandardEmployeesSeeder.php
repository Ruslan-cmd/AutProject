<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;
use App\Models\Pass;

class StandardEmployeesSeeder extends Seeder
{
    public function run()
    {
        Employee::factory()->count(30)->create();
    }
}
