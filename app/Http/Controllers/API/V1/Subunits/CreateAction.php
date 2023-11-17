<?php

declare(strict_types=1);

namespace App\Http\Controllers\API\V1\Subunits;

use App\Http\Requests\API\V1\Subunits\CreateRequest;
use App\Http\Resources\TruckSubunitResource;
use App\Models\Truck;
use App\Models\TruckSubunit;

class CreateAction
{
    public function __invoke(CreateRequest $request): TruckSubunitResource
    {
        return new TruckSubunitResource(TruckSubunit::create([
            'main_truck_id' => Truck::where('unit_number', $request->get('main_truck'))
                ->firstOrFail()
                ->id,
            'subunit_truck_id' => Truck::where('unit_number', $request->get('subunit'))
                ->firstOrFail()
                ->id,
            'start_date' => $request->get('start_date'),
            'end_date' => $request->get('end_date'),
        ]));
    }
}
