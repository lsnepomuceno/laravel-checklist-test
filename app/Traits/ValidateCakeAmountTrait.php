<?php

namespace App\Traits;

use App\Models\Cake;
use Illuminate\Auth\Access\AuthorizationException;

trait ValidateCakeAmountTrait
{
    public function validateCakeAmount(): bool
    {
        return !!Cake::where(
            [
                ['amount', '>', 0],
                ['id', '=', $this->cake_id]
            ]
        )->first();
    }

    public function failedAuthorization()
    {
        throw new AuthorizationException('This cake has no available stock.');
    }
}
