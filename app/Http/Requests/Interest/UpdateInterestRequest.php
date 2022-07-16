<?php

namespace App\Http\Requests\Interest;

use App\Traits\ValidateCakeAmountTrait;
use Illuminate\Foundation\Http\FormRequest;

class UpdateInterestRequest extends FormRequest
{
    use ValidateCakeAmountTrait;

    public function authorize(): bool
    {
        return $this->validateCakeAmount();
    }

    public function rules(): array
    {
        return [
            'cake_id' => 'sometimes|required|integer|exists:cakes,id',
            'email' => 'sometimes|required|email:rfc,dns',
            'name' => 'sometimes|required|string'
        ];
    }
}
