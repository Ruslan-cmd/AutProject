<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call(PassesSeeder::class);
        $this->call(EmployeesSeeder::class);
        $this->call(PassNumbersSeeder::class);
    }
}
