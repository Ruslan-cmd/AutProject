<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class PassNumber extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $casts = [
        'is_active' => 'boolean'
    ];
    /**
     * @var mixed|string
     */


    public function pass(): BelongsTo
    {
        return $this->belongsTo(Pass::class);
    }

    public function employees(): BelongsToMany
    {
        return $this->belongsToMany(Employee::class);
    }
}
