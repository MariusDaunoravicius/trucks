<?php

declare(strict_types=1);

namespace Tests\Feature\API\V1\Trucks;

use App\Models\Truck;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShowActionTest extends TestCase
{
    use RefreshDatabase;

    public function test_success(): void
    {
        $truck = Truck::factory()->create();
        Truck::factory()->create();

        $response = $this->getJson(route('api:v1:trucks:show', $truck->id));

        $response->assertSuccessful();
        $response->assertJsonFragment([
            'id' => $truck->id,
            'unit_number' => $truck->unit_number,
            'year' => $truck->year,
            'notes' => $truck->notes,
        ]);
    }
}
