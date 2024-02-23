<?php

namespace App\Http\Controllers;

use App\Models\Article; // Importa il modello Article dal namespace App\Models
use Illuminate\Http\Request; // Importa la classe Request dal framework Laravel
use App\Http\Controllers\Controller; // Importa la classe Controller dal namespace App\Http\Controllers

class ArticleController extends Controller // Definizione della classe ArticleController che estende Controller
{
    public function index()
    {
        // Restituisce tutti gli articoli presenti nel database.
        return Article::all();
    }

    public function show(Article $article)
    {
        // Mostra un singolo articolo specificato dal parametro $article.
        return $article;
    }

    public function store(Request $request)
    {
        // Crea un nuovo articolo utilizzando i dati dalla richiesta $request.
        $article = Article::create($request->all());

        // Restituisce una risposta JSON contenente l'articolo appena creato con il codice di stato HTTP 201 (Created).
        return response()->json($article, 201);
    }

    public function update(Request $request, Article $article)
    {
        // Aggiorna l'articolo specificato dal parametro $article con i dati dalla richiesta $request.
        $article->update($request->all());

        // Restituisce una risposta JSON contenente l'articolo aggiornato con il codice di stato HTTP 200 (OK).
        return response()->json($article, 200);
    }

    public function delete(Article $article)
    {
        // Cancella l'articolo specificato dal parametro $article.
        $article->delete();

        // Restituisce una risposta JSON vuota con il codice di stato HTTP 204 (No Content) per indicare che l'articolo è stato cancellato con successo.
        return response()->json(null, 204);
    }

    // public function index() // Metodo per ottenere tutti gli articoli
    // {
    //     return Article::all(); // Restituisce tutti gli articoli presenti nel database
    // }

    // public function show($id) // Metodo per ottenere un singolo articolo
    // {
    //     return Article::find($id); // Restituisce l'articolo corrispondente all'ID specificato
    // }

    // public function store(Request $request) // Metodo per creare un nuovo articolo
    // {
    //     return Article::create($request->all()); // Crea un nuovo articolo utilizzando i dati forniti nella richiesta
    // }

    // public function update(Request $request, $id) // Metodo per aggiornare un articolo esistente
    // {
    //     $article = Article::findOrFail($id); // Trova l'articolo con l'ID specificato o genera un'eccezione se non trovato
    //     $article->update($request->all()); // Aggiorna l'articolo con i dati forniti nella richiesta

    //     return $article; // Restituisce l'articolo aggiornato
    // }

    // public function delete(Request $request, $id) // Metodo per eliminare un articolo
    // {
    //     $article = Article::findOrFail($id); // Trova l'articolo con l'ID specificato o genera un'eccezione se non trovato
    //     $article->delete(); // Cancella l'articolo

    //     return 204; // Restituisce una risposta di successo con codice 204 (No Content)
    // }
}
