<?php

declare(strict_types=1);

namespace App\Rules;

use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidTruckYear implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $minYear = config('trucks.validation.min_year');

        if ($value < $minYear) {
            $fail(sprintf('The :attribute value must not be before %d.', $minYear));
        }

        $maxYear = Carbon::now()->addYears(config('trucks.validation.max_years_ahead'))->year;

        if ($value > $maxYear) {
            $fail(sprintf('The :attribute value must not be after %d.', $maxYear));
        }
    }
}
