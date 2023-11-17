<?php

namespace App\Http\Resources;

use App\Models\Truck;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TruckResource extends JsonResource
{
    /**
     * @var Truck
     */
    public $resource;

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource->id,
            'unit_number' => $this->resource->unit_number,
            'year' => $this->resource->year,
            'notes' => $this->resource->notes,
        ];
    }
}
