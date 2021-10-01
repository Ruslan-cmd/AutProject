<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pass extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $guarded = [];

    public function employees()
    {
        return $this->hasMany(Employee::class);

    }

    public function numbers()
    {
        return $this->hasMany(PassNumber::class);
    }
}
