<?php

use Illuminate\Support\Facades\Route;

Route::post('/', [\App\Http\Controllers\HomeController::class, 'index']);
//Route::post('/', function () { return response()->json(['ok']); });


Route::get('/', function () {
    \Illuminate\Support\Facades\Cache::add('key', 'value');
    return \Illuminate\Support\Facades\Cache::get('key');
});
