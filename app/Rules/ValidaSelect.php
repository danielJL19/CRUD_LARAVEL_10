<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidaSelect implements ValidationRule
{
    //atributo : nombre de campo, value= valor , fail = error
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if ($value==0) {
            $fail('Debes seleccionar una categoria');
        }
    }
}
