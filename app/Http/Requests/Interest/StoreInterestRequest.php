<?php

namespace App\Http\Requests\Interest;

use Illuminate\Foundation\Http\FormRequest;

class StoreInterestRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
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
