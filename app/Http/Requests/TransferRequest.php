<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransferRequest extends FormRequest
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
            'receiveracc' => 'required|exists:wallets,id|numeric',
            'receivername' => 'required|exists:wallets,username',
            'amount' => 'required|numeric'
        ];
    }
    public function messages()
    {
        return [
            'receiveracc.required'=>"Receiver's account number is required",
            'receivername.required'=>"Receiver's name is required",
            'receiveracc.exists'=>"Receiver's account number doesn't exists in the database",
            'receivername.exists'=>"Receiver's name doesn't exists in the database",
        ];
    }
}
