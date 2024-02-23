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

// Route::get('articles', function () {
//     // Se le intestazioni Content-Type e Accept sono impostate su "application/json",
//     // questo restituirà una struttura JSON. Questo verrà ripulito più tardi.
//     return Article::all(); // Restituisce tutti gli articoli presenti nel database
// });

// Route::get('articles/{id}', function ($id) {
//     return Article::find($id); // Restituisce l'articolo corrispondente all'ID specificato
// });

// Route::post('articles', function (Request $request) {
//     return Article::create($request->all); // Crea un nuovo articolo utilizzando i dati forniti nella richiesta
// });

// Route::put('articles/{id}', function (Request $request, $id) {
//     $article = Article::findOrFail($id); // Trova l'articolo con l'ID specificato o genera un'eccezione se non trovato
//     $article->update($request->all()); // Aggiorna l'articolo con i dati forniti nella richiesta

//     return $article; // Restituisce l'articolo aggiornato
// });

// Route::delete('articles/{id}', function ($id) {
//     Article::find($id)->delete(); // Trova e cancella l'articolo corrispondente all'ID specificato

//     return 204; // Restituisce una risposta di successo con codice 204 (No Content)
// });


// Route::get('articles', 'ArticleController@index'); // Rotta per ottenere tutti gli articoli, gestita dal metodo index di ArticleController
// Route::get('articles/{id}', 'ArticleController@show'); // Rotta per ottenere un singolo articolo, gestita dal metodo show di ArticleController
// Route::post('articles', 'ArticleController@store'); // Rotta per creare un nuovo articolo, gestita dal metodo store di ArticleController
// Route::put('articles/{id}', 'ArticleController@update'); // Rotta per modificare un nuovo articolo, gestita dal metodo update di ArticleController
// Route::delete('articles/{id}', 'ArticleController@delete'); // Rotta per eliminare un articolo, gestita dal metodo delete di ArticleController
