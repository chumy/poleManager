<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Qualy implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
       
        //dd($value);
        $unica = array_unique($value);
        if (count($value) !== count($unica)) {
            $fail('Revisa los valores de la qualy.');
        }

        if (in_array('0',$value) ) {
            $fail('No puede haber un 0.');
        }

        
    }
}
