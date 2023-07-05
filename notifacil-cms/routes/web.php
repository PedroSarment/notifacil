<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Category;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
})->name('home');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', ])->group(function () {

    Route::controller(App\Http\Controllers\NewsController::Class)->group(function () {

        Route::get('/noticias', 'index')->name('Noticias');
        Route::get('/noticias/cadastro', 'create')->name('Noticias/Cadastro');
        Route::post('/noticias/salva', 'store')->name('Noticias/Salva');
        Route::get('/noticias/edita/{id}', 'edit')->name('Noticias/Edita');
        Route::get('/noticias/exclui/{id}', 'delete')->name('Noticias/Exclui');
        Route::delete('/noticias/apaga/{id}', 'destroy')->name('Noticias/Apaga');
        Route::post('/noticias/atualiza/{id}', 'update')->name('Noticias/Atualiza');
        Route::get('/noticias/{id}', 'view')->name('Noticias/View');
    });

    Route::controller(App\Http\Controllers\CategoryController::Class)->group(function () {

        Route::get('/categorias', 'index')->name('Categorias');
        Route::get('/categorias/cadastro', 'create')->name('Coticias/Cadastro');
        Route::post('/categorias/salva', 'store')->name('Categorias/Salva');
        Route::get('/categorias/exclui/{id}', 'delete')->name('Categorias/Exclui');
        Route::post('/categorias/apaga/{id}', 'destroy')->name('Categorias/Apaga');
    });

});
