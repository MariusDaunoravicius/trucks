<?php

declare(strict_types=1);

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class TruckFactory extends Factory
{
    public function definition(): array
    {
        return [
            'unit_number' => fake()->unique()->word,
            'year' => Carbon::now()->year,
            'notes' => fake()->text,
        ];
    }
}
