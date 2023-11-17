<?php

declare(strict_types=1);

namespace App\Http\Controllers\API\V1\Trucks;

use App\Http\Resources\TruckResource;
use App\Models\Truck;

class ShowAction
{
    public function __invoke(int $id): TruckResource
    {
        return new TruckResource(Truck::findOrFail($id));
    }
}
