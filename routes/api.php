<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::prefix('v1')->as('api:v1:')->group(
    base_path('routes/v1/api.php'),
);
