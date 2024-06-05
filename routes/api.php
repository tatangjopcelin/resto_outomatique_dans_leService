<?php

use App\Http\Controllers\CathegorieController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TableController;
use App\Http\Controllers\ProduitCommandeController;


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

Route::prefix('table')->group(function () {
    Route::controller(TableController::class)->group(function () {
        Route::get('/',"index");
        Route::get('/{id}',"show");
        Route::post('/',"store");
        Route::put('/{id}',"update");
        Route::delete('/{id}',"destroy");
    });
});

Route::prefix('cathegorie')->group(function () {
    Route::controller(CathegorieController::class)->group(function () {
        Route::get('/',"index");
        Route::get('/{id}',"show");
        Route::post('/',"store");
        Route::put('/{id}',"update");
        Route::delete('/{id}',"destroy");
    });
});

Route::prefix('produitCommande')->group(function () {
    Route::controller(ProduitCommandeController::class)->group(function () {
        Route::get('/',"index");
        Route::get('/{id}',"show");
        Route::post('/',"store");
        Route::put('/{id}',"update");
        Route::delete('/{id}',"destroy");
    });
});
