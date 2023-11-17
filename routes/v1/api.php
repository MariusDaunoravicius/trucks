<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::prefix('trucks')->as('trucks:')->group(
    base_path(path: 'routes/v1/trucks.php'),
);

Route::prefix('subunits')->as('subunits:')->group(
    base_path(path: 'routes/v1/subunits.php'),
);
