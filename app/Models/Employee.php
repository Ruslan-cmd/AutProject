<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends Model
{
    use HasFactory;

    protected $guarded = [];
    /**
     * @var mixed
     */
    public $pass;

    public function pass(): BelongsTo
    {
        return $this->belongsTo(Pass::class);

    }
}
