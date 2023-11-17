<?php

declare(strict_types=1);

use App\Http\Controllers\API\v1\Trucks\CreateAction;
use App\Http\Controllers\API\v1\Trucks\DeleteAction;
use App\Http\Controllers\API\v1\Trucks\GetAction;
use App\Http\Controllers\API\v1\Trucks\ShowAction;
use App\Http\Controllers\API\v1\Trucks\UpdateAction;

Route::get('', GetAction::class)->name('get');
Route::post('', CreateAction::class)->name('create');
Route::post('{truck}', UpdateAction::class)->name('update');
Route::get('{truck}', ShowAction::class)->name('show');
Route::delete('{truck}', DeleteAction::class)->name('delete');
