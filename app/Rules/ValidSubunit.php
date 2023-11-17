<?php

declare(strict_types=1);

namespace App\Rules;

use App\Models\Truck;
use App\Models\TruckSubunit;
use Closure;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Database\Eloquent\Builder;

class ValidSubunit implements ValidationRule, DataAwareRule
{
    protected array $data = [];

    public function setData(array $data): static
    {
        $this->data = $data;

        return $this;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $mainTruck = Truck::where('unit_number', $this->data['main_truck'])->firstOrFail();
        $subunit = Truck::where('unit_number', $this->data['subunit'])->firstOrFail();
        $startDate = $this->data['start_date'];
        $endDate = $this->data['end_date'];

        if ($this->isMainTruckAlreadyExisting($mainTruck->id, $startDate, $endDate)) {
            $fail('The main truck already has a subunit for these dates.');
        }

        if ($this->isSubunitAlreadyExisting($mainTruck->id, $startDate, $endDate)) {
            $fail('The main truck is already a subunit for these dates.');
        }

        if ($this->isSubunitAlreadyExisting($subunit->id, $startDate, $endDate)) {
            $fail('The subunit is already taken for these dates.');
        }
    }

    private function isMainTruckAlreadyExisting(int $truckId, string $startDate, string $endDate): bool
    {
        return TruckSubunit::where('main_truck_id', $truckId)
            ->where(function (Builder $query) use ($startDate, $endDate) {
                $query->whereBetween('start_date', [$startDate, $endDate]);
                $query->orWhereBetween('end_date', [$startDate, $endDate]);
            })->exists();
    }

    private function isSubunitAlreadyExisting(int $truckId, string $startDate, string $endDate): bool
    {
        return TruckSubunit::where('subunit_truck_id', $truckId)
            ->where(function (Builder $query) use ($startDate, $endDate) {
                $query->whereBetween('start_date', [$startDate, $endDate]);
                $query->orWhereBetween('end_date', [$startDate, $endDate]);
            })->exists();
    }
}
