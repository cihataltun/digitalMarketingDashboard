<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdController;


Route::prefix('ads')->group(function () {
    Route::get('/', [AdController::class, 'index']);
    Route::post('/store', [AdController::class, 'store']);
    Route::get('/{id}', [AdController::class, 'show']);
    Route::put('/update/{id}', [AdController::class, 'update']);
    Route::delete('/delete/{id}', [AdController::class, 'destroy']);
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
