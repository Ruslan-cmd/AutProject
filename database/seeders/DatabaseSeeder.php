<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Employee::factory()->withPassNumber()->count(15)->create();
        Employee::factory()->withLostPass()->count(15)->create();
        Employee::factory()->fired()->count(15)->create();
    }
}
