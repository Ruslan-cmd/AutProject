<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\Pass;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\PassNumber;
class PassFactory extends Factory
{

    protected $model = Pass::class;

    public function definition(): array
    {
        return [

        ];
    }
    public function configure(): PassFactory
    {
        return $this->has(PassNumber::factory(), 'numbers');
    }
   /* public function configureEmployee(): PassFactory
    {
        return $this->has(Employee::factory(), 'employees');
    }
*/
}
