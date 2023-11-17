<?php

declare(strict_types=1);

namespace Tests\Feature\API\V1\Subunits;

use App\Models\Truck;
use App\Models\TruckSubunit;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateActionTest extends TestCase
{
    use RefreshDatabase;

    public function test_success(): void
    {
        $mainTruck = Truck::factory()->create();
        $subunit = Truck::factory()->create();

        $actionData = [
            'main_truck' => $mainTruck->unit_number,
            'subunit' => $subunit->unit_number,
            'start_date' => Carbon::now()->format('Y-m-d'),
            'end_date' => Carbon::now()->addDays(10)->format('Y-m-d'),
        ];

        $response = $this->postJson(route('api:v1:subunits:create'), $actionData);

        $response->assertSuccessful();
        $response->assertJsonFragment([
            'id' => TruckSubunit::first()->id,
            'main_truck' => [
                'id' => $mainTruck->id,
                'unit_number' => $mainTruck->unit_number,
                'year' => $mainTruck->year,
                'notes' => $mainTruck->notes,
            ],
            'subunit' => [
                'id' => $subunit->id,
                'unit_number' => $subunit->unit_number,
                'year' => $subunit->year,
                'notes' => $subunit->notes,
            ],
            'start_date' => $actionData['start_date'],
            'end_date' => $actionData['end_date'],
        ]);
    }
}
