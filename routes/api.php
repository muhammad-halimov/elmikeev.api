<?php

use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\RevenueController;
use App\Http\Controllers\Api\SaleController;
use App\Http\Controllers\Api\StockController;
use Illuminate\Support\Facades\Route;

//use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::middleware(['verify.token'])->group(function () {
    Route::get('sales', [SaleController::class, 'index']);
    Route::get('stocks', [StockController::class, 'index']);
    Route::get('orders', [OrderController::class, 'index']);
    Route::get('revenue', [RevenueController::class, 'index']);
});

//Route::get('orders', [OrderController::class, 'index']);
