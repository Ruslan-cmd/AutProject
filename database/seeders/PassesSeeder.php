<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;
use App\Models\Pass;

class PassesSeeder extends Seeder
{

    public function run()
    {
        Pass::factory()->count(30)->create();
    }
}
