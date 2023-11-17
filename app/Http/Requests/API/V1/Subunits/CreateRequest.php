<?php

declare(strict_types=1);

namespace App\Http\Requests\API\V1\Subunits;

use App\Rules\ValidSubunit;
use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'main_truck' => ['required', 'string', 'exists:trucks,unit_number'],
            'subunit' => [
                'required',
                'string',
                'exists:trucks,unit_number',
                'different:main_truck',
                new ValidSubunit(),
            ],
            'start_date' => ['required', 'date', 'before:end_date'],
            'end_date' => ['required', 'date', 'after:start_date'],
        ];
    }
}
