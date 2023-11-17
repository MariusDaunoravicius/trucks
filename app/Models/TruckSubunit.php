<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class TruckSubunit extends Model
{
    protected $fillable = [
        'main_truck_id',
        'subunit_truck_id',
        'start_date',
        'end_date',
    ];

    protected $casts = [
        'main_truck_id' => 'integer',
        'subunit_truck_id' => 'integer',
    ];

    public function mainTruck(): HasOne
    {
        return $this->hasOne(Truck::class, 'id', 'main_truck_id');
    }

    public function subunit(): HasOne
    {
        return $this->hasOne(Truck::class, 'id', 'subunit_truck_id');
    }
}
