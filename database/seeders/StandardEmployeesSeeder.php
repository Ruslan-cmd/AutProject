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
        Employee::factory()->withPassNumber()->count(30)->create();
    }
}

