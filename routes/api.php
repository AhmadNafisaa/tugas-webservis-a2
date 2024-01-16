<?php

use App\Http\Controllers\ProdukController;
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
Route::get("/products" ,[ProdukController::class, 'index']);
Route::post("/products" ,[ProdukController::class, 'store']);
Route::put("/products/{id}", [ProdukController::class, 'update']);
Route::delete("/products/{id}", [ProdukController::class, 'destroy']);