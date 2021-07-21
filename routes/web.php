<?php

use Illuminate\Support\Facades\Route;


Route::any('/', [\App\Http\Controllers\HomeController::class, 'index']);
