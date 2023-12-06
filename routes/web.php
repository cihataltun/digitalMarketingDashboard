<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdController;
use App\Http\Controllers\MetricsController;



Route::get('/dashboard', [AdController::class, 'showDashboard']);

Route::get('/metrics/{platform}', [MetricsController::class, 'show'])->name('platform.metrics');


Route::prefix('ads')->group(function () {
    Route::get('/', [AdController::class, 'index']);
    Route::post('/store', [AdController::class, 'store']);
    Route::get('/{id}', [AdController::class, 'show']);
    Route::put('/update/{id}', [AdController::class, 'update']);
    Route::delete('/delete/{id}', [AdController::class, 'destroy']);

    Route::get('/calculate-cpc/{spend}/{clicks}', function ($spend, $clicks) {
        return (new AdController())->calculateCPC($spend, $clicks);
    });

    Route::get('/calculate-cpi/{spend}/{impressions}', function ($spend, $impressions) {
        return (new AdController())->calculateCPI($spend, $impressions);
    });

    Route::get('/calculate-roi/{revenue}/{spend}', function ($revenue, $spend) {
        return (new AdController())->calculateROI($revenue, $spend);
    });
});
