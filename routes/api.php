<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImagenController;

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

Route::get('/imagenes', [ImagenController::class, 'index']);
Route::post('/imagenes', [ImagenController::class, 'store']);
Route::delete('imagenes/{id}', [ImagenController::class, 'destroy']);
