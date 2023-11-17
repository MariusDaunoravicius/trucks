<?php

declare(strict_types=1);

namespace App\Http\Requests\API\V1\Trucks;

use Illuminate\Foundation\Http\FormRequest;

class GetRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'page' => ['integer', 'min:1'],
        ];
    }
}
