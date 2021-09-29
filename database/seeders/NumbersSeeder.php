<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Number;

class NumbersSeeder extends Seeder
{

    public function run()
    {
        Number::factory()->count(60)->create();
    }
}
