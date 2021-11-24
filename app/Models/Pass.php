<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pass extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = [];



    public function numbers(): HasMany
    {
        return $this->hasMany(PassNumber::class);
    }
}
