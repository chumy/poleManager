<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Posicion implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //
        $posicionesValidas = [];
        foreach ($value as $v){
            if ($v > 0)
                array_push($posicionesValidas,$v);
        }

        $unica = array_unique($posicionesValidas);
        if (count($posicionesValidas) !== count($unica)) {
            $fail('Revisa los valores de las posiciones.');
        }

        if (count($posicionesValidas) == 0)
            $fail('Las posiciones son obligatorias.');

    }
}
