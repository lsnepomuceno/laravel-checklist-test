<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Interest extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function cake(): BelongsTo
    {
        return $this->belongsTo(Cake::class);
    }
}
