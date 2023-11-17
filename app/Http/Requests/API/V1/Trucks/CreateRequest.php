<?php

declare(strict_types=1);

namespace App\Http\Requests\API\V1\Trucks;

use App\Rules\ValidTruckYear;
use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'unit_number' => ['required', 'string', 'max:255', 'unique:trucks,unit_number'],
            'year' => ['required', 'integer', new ValidTruckYear()],
            'notes' => ['string'],
        ];
    }
}
