<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cake extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function interests(): HasMany
    {
        return $this->hasMany(Interest::class);
    }
}
