<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('product')->group(function () {
    Route::post('add', [\App\Http\Controllers\ProductController::class, 'store']);
    Route::get('', [\App\Http\Controllers\ProductController::class, 'index']);
});
