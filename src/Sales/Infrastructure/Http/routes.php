<?php

use Illuminate\Support\Facades\Route;
use Sales\Infrastructure\Http\Controllers\{CreateSaleController, ListSaleController};

Route::get('/sales', ListSaleController::class);
Route::post('/sales', CreateSaleController::class);
