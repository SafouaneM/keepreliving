<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class MediaValidator implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if ($value->getSize() > 1024 * 1024 * 10) {
            $fail('The :attribute must be less than 10MB.');
        }

        if (!in_array($value->getClientOriginalExtension(), ['jpg', 'jpeg', 'png', 'gif'])) {
            $fail('The :attribute must be a file of type: jpg, jpeg, png, gif.');
        }
    }
}
