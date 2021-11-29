<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Employee extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function passNumbers(): BelongsToMany
    {
        return $this->belongsToMany(PassNumber::class)->withPivot('created_at', 'deleted_at');

    }
}
