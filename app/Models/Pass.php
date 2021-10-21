<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pass extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;

    /* public function employees(): HasMany
     {
         return $this->hasMany(Employee::class);

     }*/

    public function numbers(): HasMany
    {
        return $this->hasMany(PassNumber::class);
    }

    public function histories(): HasMany
    {
        return $this->hasMany(History::class);
    }
}
