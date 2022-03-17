<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('_/healthcheck', [App\Http\Action\HealthCheck::class,'__invoke'])->name('app_healthcheck');

Route::prefix('v1')->group(function() {

    Route::prefix('/real_estate')->group(function() {
        Route::get('/',[App\Http\Controllers\Api\RealEstateController::class, 'index'])->name('realestate_main');
        Route::post('/',[App\Http\Action\RealEstateCreate::class,'__invoke'])->name('realestate_create');
        Route::post('/listByParams',[App\Http\Action\RealEstateRead::class,'__invoke'])->name('realestate_retrieve');
    });
});
