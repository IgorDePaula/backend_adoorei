<?php

use Illuminate\Support\Facades\Route;
use Product\Infrastructure\Http\Controllers\ListProductController;

Route::get('/products', ListProductController::class);
