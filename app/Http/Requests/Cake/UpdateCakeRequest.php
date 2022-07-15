<?php

namespace App\Http\Requests\Cake;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCakeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'sometimes|required|string',
            'weight' => 'sometimes|required|numeric',
            'value' => 'sometimes|required|numeric',
            'amount' => 'sometimes|required|integer'
        ];
    }
}
