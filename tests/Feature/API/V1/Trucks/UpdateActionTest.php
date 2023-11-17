<?php

declare(strict_types=1);

namespace Tests\Feature\API\V1\Trucks;

use App\Models\Truck;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UpdateActionTest extends TestCase
{
    use RefreshDatabase;

    public function test_success(): void
    {
        $truck = Truck::factory()->create();

        $actionData = [
            'unit_number' => fake()->word,
            'year' => Carbon::now()->year,
            'notes' => fake()->text,
        ];

        $response = $this->postJson(route('api:v1:trucks:update', $truck->id), $actionData);

        $updatedData = array_merge(['id' => $truck->id], $actionData);
        $response->assertSuccessful();
        $response->assertJsonFragment($updatedData);

        $this->assertDatabaseHas('trucks', $updatedData);
    }
}
