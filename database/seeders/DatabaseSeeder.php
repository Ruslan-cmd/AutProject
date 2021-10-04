<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call(StandardEmployeesSeeder::class);
        $this->call(EmployeesWithLostPassesSeeder::class);
        $this->call(FiredEmployeesSeeder::class);
    }
}
