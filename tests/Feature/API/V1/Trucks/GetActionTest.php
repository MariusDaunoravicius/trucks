<?php

declare(strict_types=1);

namespace Tests\Feature\API\V1\Trucks;

use App\Models\Truck;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GetActionTest extends TestCase
{
    use RefreshDatabase;

    public function test_success(): void
    {
        $trucks = Truck::factory()->count(5)->create();

        $response = $this->getJson(route('api:v1:trucks:get'));

        $response->assertSuccessful();
        $response->assertJsonStructure(['data', 'links', 'meta']);
        $response->assertJsonCount(5, 'data');

        $trucksData = [];
        foreach ($trucks as $truck) {
            $trucksData[] = [
                'id' => $truck->id,
                'unit_number' => $truck->unit_number,
                'year' => $truck->year,
                'notes' => $truck->notes,
            ];
        }

        $response->assertJsonFragment(['data' => $trucksData]);
    }
}
