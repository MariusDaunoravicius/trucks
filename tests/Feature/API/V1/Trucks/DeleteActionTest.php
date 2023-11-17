<?php

declare(strict_types=1);

namespace Tests\Feature\API\V1\Trucks;

use App\Models\Truck;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DeleteActionTest extends TestCase
{
    use RefreshDatabase;

    public function test_success(): void
    {
        $truck = Truck::factory()->create();
        $otherTruck = Truck::factory()->create();

        $response = $this->deleteJson(route('api:v1:trucks:delete', $truck->id));

        $response->assertSuccessful();

        $this->assertDatabaseMissing('trucks', ['id' => $truck->id]);
        $this->assertDatabaseHas('trucks', ['id' => $otherTruck->id]);
    }
}
