<?php

namespace App\Rules;

use App\Models\Wallet;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class VerifyReceiverDetails implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $username = Wallet::where('id',$_REQUEST['receiveracc'])->pluck('username')->toArray()[0];
        if(!($value == $username))
        $fail("Receiver's account number and name does not match");
    }
}
