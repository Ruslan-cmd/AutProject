<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PassNumber;

class PassNumbersSeeder extends Seeder
{

    public function run()
    {
        PassNumber::factory()->count(60)->create();
    }
}
