<?php

declare(strict_types=1);

namespace App\Http\Controllers\API\V1\Trucks;

use App\Http\Requests\API\V1\Trucks\CreateRequest;
use App\Http\Resources\TruckResource;
use App\Models\Truck;

class CreateAction
{
    public function __invoke(CreateRequest $request): TruckResource
    {
        return new TruckResource(Truck::create([
            'unit_number' => $request->get('unit_number'),
            'year' => $request->integer('year'),
            'notes' => $request->get('notes'),
        ]));
    }
}
