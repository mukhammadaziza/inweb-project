<?php

use App\Http\Controllers\API\V1\AuthController;
use App\Http\Controllers\API\V1\CategoryController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::prefix('v1')->group(function () {

    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/pages', [PageController::class, 'index']);
    Route::get('/pages/{page}', [PageController::class, 'show']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::apiResource('categories', CategoryController::class);

        Route::post('/pages', [PageController::class, 'store']);
        Route::put('/pages/{page}', [PageController::class, 'update']);
        Route::delete('/pages/{page}', [PageController::class, 'destroy']);
    });
});