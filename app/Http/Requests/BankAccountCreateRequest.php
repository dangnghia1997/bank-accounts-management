<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BankAccountCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'deposit' => 'required|numeric|gt:0',
            'account_number' => 'required|unique:bank_accounts,account_number',
        ];
    }
}
