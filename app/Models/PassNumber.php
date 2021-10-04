<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class PassNumber extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function pass(): BelongsTo
    {
        return $this->belongsTo(Pass::class);

    }
}
