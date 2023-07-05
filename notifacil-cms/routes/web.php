<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
    Route::get('/noticias', function () {
        return Inertia::render('Dashboard');
    })->name('noticias');
    Route::get('/categorias', function () {
        return Inertia::render('Welcome');
    })->name('categorias');

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

});
