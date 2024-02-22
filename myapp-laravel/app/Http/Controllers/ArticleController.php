<?php

namespace App\Http\Controllers;

use App\Models\Article; // Importa il modello Article dal namespace App\Models
use Illuminate\Http\Request; // Importa la classe Request dal framework Laravel
use App\Http\Controllers\Controller; // Importa la classe Controller dal namespace App\Http\Controllers

class ArticleController extends Controller // Definizione della classe ArticleController che estende Controller
{
    public function index() // Metodo per ottenere tutti gli articoli
    {
        return Article::all(); // Restituisce tutti gli articoli presenti nel database
    }

    public function show($id) // Metodo per ottenere un singolo articolo
    {
        return Article::find($id); // Restituisce l'articolo corrispondente all'ID specificato
    }

    public function store(Request $request) // Metodo per creare un nuovo articolo
    {
        return Article::create($request->all()); // Crea un nuovo articolo utilizzando i dati forniti nella richiesta
    }

    public function update(Request $request, $id) // Metodo per aggiornare un articolo esistente
    {
        $article = Article::findOrFail($id); // Trova l'articolo con l'ID specificato o genera un'eccezione se non trovato
        $article->update($request->all()); // Aggiorna l'articolo con i dati forniti nella richiesta

        return $article; // Restituisce l'articolo aggiornato
    }

    public function delete(Request $request, $id) // Metodo per eliminare un articolo
    {
        $article = Article::findOrFail($id); // Trova l'articolo con l'ID specificato o genera un'eccezione se non trovato
        $article->delete(); // Cancella l'articolo

        return 204; // Restituisce una risposta di successo con codice 204 (No Content)
    }
}
