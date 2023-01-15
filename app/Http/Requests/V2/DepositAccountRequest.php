<?php

namespace App\Http\Requests\V2;

use Illuminate\Foundation\Http\FormRequest;

class DepositAccountRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'sum' => 'required|integer|between:1,99999',
        ];
    }
}
