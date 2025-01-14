<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BankTransferRequest extends FormRequest
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
            'from' => 'required|exists:bank_accounts,account_number|different:to',
            'to' => 'required|exists:bank_accounts,account_number|different:from',
            'amount' => 'required|numeric|gt:0',
        ];
    }
}
