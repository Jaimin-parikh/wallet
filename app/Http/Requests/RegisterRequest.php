<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password as RulesPassword;

class RegisterRequest extends FormRequest
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
            "username" => 'required|unique:wallets,username',
            "password" => ['required', RulesPassword::min(8)->letters()->numbers()->symbols()->mixedCase()],
            "email" => 'required|unique:wallets,email|email',
            "adhar" => 'required|unique:wallets,adhar|digits:12',
            "contact_number" => 'required|unique:wallets,contact_number|digits:10',
        ];
    }
    // public function messages()
    // {
    //     return [

    //     ];
    // }
}
