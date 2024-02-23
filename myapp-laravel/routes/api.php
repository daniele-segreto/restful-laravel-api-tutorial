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

// Route::get('articles', 'ArticleController@index'); // Rotta per ottenere tutti gli articoli, gestita dal metodo index di ArticleController
// Route::get('articles/{article}', 'ArticleController@show'); // Rotta per ottenere un singolo articolo, gestita dal metodo show di ArticleController
// Route::post('articles', 'ArticleController@store'); // Rotta per creare un nuovo articolo, gestita dal metodo store di ArticleController
// Route::put('articles/{article}', 'ArticleController@update'); // Rotta per modificare un nuovo articolo, gestita dal metodo update di ArticleController
// Route::delete('articles/{article}', 'ArticleController@delete'); // Rotta per eliminare un articolo, gestita dal metodo delete di ArticleController

// Definisce una rotta POST per la registrazione degli utenti, che
// invoca il metodo register del controller Auth\RegisterController.
Route::post('register', 'Auth\RegisterController@register');

// Definisce una route POST per gestire le richieste di login
// indirizzando i dati alla funzione 'login' nel controller 'Auth\LoginController'.
Route::post('login', 'Auth\LoginController@login');

// Definisce una route POST per gestire le richieste di logout, indirizzando i dati alla funzione 'logout' nel controller 'Auth\LoginController'.
Route::post('logout', 'Auth\LoginController@logout');

// Definisce una route protetta che richiede l'autenticazione API.
// Utilizza il middleware 'auth:api' per assicurarsi che l'utente sia autenticato.
// Se l'utente è autenticato, restituisce i dati dell'utente autenticato.
// Questa route consente agli utenti autenticati di recuperare le proprie informazioni.
Route::middleware('auth:api')
    ->get('/user', function (Request $request) {
        return $request->user();
    });


// Auth::guard('api')->user(); // istanza dell'utente loggato
// Auth::guard('api')->check(); // se un utente è autenticato
// Auth::guard('api')->id(); // l'id dell'utente autenticato


// Questo gruppo di rotte è protetto dall'autenticazione API.
Route::group(['middleware' => 'auth:api'], function () {

    // Rotta per visualizzare tutti gli articoli.
    Route::get('articles', 'ArticleController@index');

    // Rotta per visualizzare un singolo articolo basato sul suo ID.
    Route::get('articles/{article}', 'ArticleController@show');

    // Rotta per creare un nuovo articolo.
    Route::post('articles', 'ArticleController@store');

    // Rotta per aggiornare un articolo esistente basato sul suo ID.
    Route::put('articles/{article}', 'ArticleController@update');

    // Rotta per eliminare un articolo esistente basato sul suo ID.
    Route::delete('articles/{article}', 'ArticleController@delete');
});
