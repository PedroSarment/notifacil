<?php

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

Route::get('/noticias/recentes', 'App\Http\Controllers\NewsController@mostRecent');
Route::get('/noticias/mais_visualizadas', 'App\Http\Controllers\NewsController@mostViewed');
Route::get('/noticias/{id}', 'App\Http\Controllers\NewsController@single');
