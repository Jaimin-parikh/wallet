<?php

namespace App\Rules;

use App\Models\Wallet;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

use function PHPUnit\Framework\returnSelf;

class Amount implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $amount = Wallet::where('id',session('id'))->pluck('balance')->toArray()[0];
       if($value > $amount)
        $fail("Amount must not be greater than $amount");
    }
}
