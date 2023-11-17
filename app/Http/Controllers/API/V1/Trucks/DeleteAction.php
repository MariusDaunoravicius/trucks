<?php

declare(strict_types=1);

namespace App\Http\Controllers\API\V1\Trucks;

use App\Models\Truck;
use Illuminate\Http\JsonResponse;

class DeleteAction
{
    public function __invoke(Truck $truck): JsonResponse
    {
        $truck->delete();

        return response()->json();
    }
}
