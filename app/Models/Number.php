<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Number extends Model
{
    use HasFactory;
    protected  $guarded =[];
    public function pass()
    {
        return $this->belongsTo(Pass::class);

    }
}
