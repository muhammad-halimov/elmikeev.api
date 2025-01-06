<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'dateFrom' => 'required|date',
            'dateTo' => 'required|date',
        ];
    }

    public function messages(): array
    {
        return [
            'dateFrom.required' => 'The dateFrom parameter is required.',
            'dateTo.required' => 'The dateTo parameter is required.',
        ];
    }
}
