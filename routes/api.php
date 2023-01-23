<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SewaController;
use App\Http\Controllers\WishController;
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

Route::apiResource('sewas', SewaController::class);
Route::get('rekomendasi', [SewaController::class,'Rekomendasi']);
Route::apiResource('wish', WishController::class)->middleware('auth:sanctum');

Route::get('/search/{name}', [SewaController::class,'Search']);
Route::get('/dashboard', [SewaController::class,'Dashboard']);
Route::apiResource('kategoris', KategoriController::class);

Route::get('kategori/{kate}', [SewaController::class,'byKategori']);

Route::post('/register',RegisterController::class);
Route::post('/login',LoginController::class);