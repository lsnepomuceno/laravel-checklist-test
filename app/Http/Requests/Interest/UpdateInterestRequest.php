<?php

namespace App\Http\Requests\Interest;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInterestRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
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
