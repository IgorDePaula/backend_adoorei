<?php

use Illuminate\Support\Facades\Route;
use Sales\Infrastructure\Http\Controllers\ListSaleController;

Route::get('/sales', ListSaleController::class);
