<?php

namespace App\Http\Requests\Interest;

use App\Traits\ValidateCakeAmountTrait;
use Illuminate\Foundation\Http\FormRequest;

class StoreInterestRequest extends FormRequest
{
    use ValidateCakeAmountTrait;

    public function authorize(): bool
    {
        return $this->validateCakeAmount();
    }

    public function rules(): array
    {
        return [
            'cake_id' => 'required|integer|exists:cakes,id',
            'email' => 'required|email:rfc,dns',
            'name' => 'required|string'
        ];
    }
}
