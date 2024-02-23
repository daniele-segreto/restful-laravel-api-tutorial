<?php

namespace App\Exceptions;

use Exception;
use Throwable; // Importa la classe Throwable

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * Elenco degli input che non vengono mai salvati nella sessione durante le eccezioni di validazione.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Registra i callback di gestione delle eccezioni per l'applicazione.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * Gestisce la resa della risposta per le eccezioni.
     */
    public function render($request, Throwable $exception)
    {
        // Se l'eccezione è del tipo ModelNotFoundException e la richiesta vuole una risposta JSON,
        // restituiamo una risposta JSON con un messaggio "Risorsa non trovata" e lo status code 404.
        if ($exception instanceof ModelNotFoundException && $request->wantsJson()) {
            return response()->json([
                'data' => 'Risorsa non trovata'
            ], 404);
        }

        // Altrimenti, restituisci la gestione predefinita delle eccezioni.
        return parent::render($request, $exception);
    }
}
