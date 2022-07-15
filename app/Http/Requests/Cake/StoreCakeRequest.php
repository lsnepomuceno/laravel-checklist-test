<?php

namespace App\Http\Requests\Cake;

use Illuminate\Foundation\Http\FormRequest;

class StoreCakeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'bail|required|string',
            'weight' => 'required|numeric',
            'value' => 'required|numeric',
            'amount' => 'required|integer'
        ];
    }
}
