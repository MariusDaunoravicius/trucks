<?php

declare(strict_types=1);

namespace App\Http\Controllers\API\V1\Trucks;

use App\Http\Requests\API\V1\Trucks\UpdateRequest;
use App\Http\Resources\TruckResource;
use App\Models\Truck;

class UpdateAction
{
    public function __invoke(Truck $truck, UpdateRequest $request): TruckResource
    {
        $truck->update([
            'unit_number' => $request->get('unit_number'),
            'year' => $request->integer('year'),
            'notes' => $request->get('notes'),
        ]);

        return new TruckResource($truck);
    }
}
