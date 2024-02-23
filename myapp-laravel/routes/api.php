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

use App\Models\Article; // Importa il modello Article dal namespace App\Models

Route::get('articles', 'ArticleController@index'); // Rotta per ottenere tutti gli articoli, gestita dal metodo index di ArticleController
Route::get('articles/{article}', 'ArticleController@show'); // Rotta per ottenere un singolo articolo, gestita dal metodo show di ArticleController
Route::post('articles', 'ArticleController@store'); // Rotta per creare un nuovo articolo, gestita dal metodo store di ArticleController
Route::put('articles/{article}', 'ArticleController@update'); // Rotta per modificare un nuovo articolo, gestita dal metodo update di ArticleController
Route::delete('articles/{article}', 'ArticleController@delete'); // Rotta per eliminare un articolo, gestita dal metodo delete di ArticleController

// Definisce una rotta POST per la registrazione degli utenti, che
// invoca il metodo register del controller Auth\RegisterController.
Route::post('register', 'Auth\RegisterController@register');
