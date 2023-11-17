<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truck extends Model
{
    use HasFactory;

    protected $fillable = [
        'unit_number',
        'year',
        'notes',
    ];

    protected $casts = [
        'year' => 'integer',
    ];
}
