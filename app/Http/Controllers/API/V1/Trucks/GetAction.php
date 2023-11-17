<?php

declare(strict_types=1);

namespace App\Http\Controllers\API\V1\Trucks;

use App\Http\Requests\API\V1\Trucks\GetRequest;
use App\Http\Resources\TruckCollection;
use App\Models\Truck;

class GetAction
{
    public const ITEMS_PER_PAGE = 10;

    public function __invoke(GetRequest $request): TruckCollection
    {
        $trucks = Truck::paginate(perPage: self::ITEMS_PER_PAGE, page: $request->integer('page', 1));

        return new TruckCollection($trucks);
    }
}
