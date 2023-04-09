<?php

use App\Http\Controllers\Api\CarController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('car')->name('.car')->group(function (){
    Route::get('',[CarController::class, 'show'])->name('show');
    Route::post('',[CarController::class, 'store'])->name('store');
    Route::put('{car}',[CarController::class, 'update'])->name('update');
    Route::delete('{car}',[CarController::class, 'destroy'])->name('destroy');
});
