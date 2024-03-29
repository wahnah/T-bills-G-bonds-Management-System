<?php

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

Route::middleware('auth:sanctum')->group(function () {
    Route::get('purchases', [App\Http\Controllers\PurchaseController::class, 'getUserPurchases'])->name('purchases');
    Route::get('purchasez', [App\Http\Controllers\PurchaseController::class, 'getShortTermPurchases'])->name('purchasez');
    Route::get('secpurchases', [App\Http\Controllers\PurchaseController::class, 'yourSecondaryPurchases'])->name('secpurchases');
});
