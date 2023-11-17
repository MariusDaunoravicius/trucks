<?php

declare(strict_types=1);

namespace Tests\Feature\API\V1\Trucks;

use App\Models\Truck;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateActionTest extends TestCase
{
    use RefreshDatabase;

    public function test_success(): void
    {
        $actionData = [
            'unit_number' => fake()->word,
            'year' => Carbon::now()->year,
            'notes' => fake()->text,
        ];

        $response = $this->postJson(route('api:v1:trucks:create'), $actionData);

        $response->assertSuccessful();
        $response->assertJsonFragment(array_merge(['id' => Truck::first()->id], $actionData));
    }
}
