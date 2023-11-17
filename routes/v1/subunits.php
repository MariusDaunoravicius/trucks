<?php

declare(strict_types=1);

use App\Http\Controllers\API\v1\Subunits\CreateAction;

Route::post('', CreateAction::class)->name('create');
