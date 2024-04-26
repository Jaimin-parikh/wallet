<?php

namespace App\Http\Requests;

use App\Models\Wallet;
use App\Rules\Amount;
use App\Rules\SelfTransfer;
use App\Rules\VerifyReceiverDetails;
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
        // $amount = Wallet::where('id',session('id'))->pluck('balance')->toArray()[0];
        return [
            'receiveracc' => ["required","exists:wallets,id","numeric", new SelfTransfer],
            'receivername' => ["required","exists:wallets,username",new VerifyReceiverDetails],
            'amount' => ["required","numeric","min:0",new Amount]
        ];
    }
    public function messages()
    {
        return [
            'receiveracc.required'=>"Receiver's account number is required",
            'receivername.required'=>"Receiver's name is required",
            'receiveracc.exists'=>"Receiver's account number doesn't exists in the database",
            'receivername.exists'=>"Receiver's name doesn't exists in the database",
            "amount"
        ];
    }
}
