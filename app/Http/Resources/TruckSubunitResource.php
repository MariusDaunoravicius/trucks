<?php

namespace App\Http\Resources;

use App\Models\TruckSubunit;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TruckSubunitResource extends JsonResource
{
    /**
     * @var TruckSubunit
     */
    public $resource;

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource->id,
            'main_truck' => new TruckResource($this->resource->mainTruck),
            'subunit' => new TruckResource($this->resource->subunit),
            'start_date' => $this->resource->start_date,
            'end_date' => $this->resource->end_date,
        ];
    }
}
