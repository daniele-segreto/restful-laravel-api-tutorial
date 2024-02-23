<?php

namespace App\Exceptions;

use Exception;
use Throwable;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Exception $exception)
    {
        // Questo sostituirà la nostra risposta 404 con
        // una risposta JSON.
        if (
            $exception instanceof ModelNotFoundException &&
            $request->wantsJson()
        ) {
            // Se l'eccezione è del tipo ModelNotFoundException
            // e la richiesta vuole una risposta JSON,
            // restituiamo una risposta JSON con un messaggio
            // "Risorsa non trovata" e lo status code 404.
            return response()->json([
                'data' => 'Risorsa non trovata'
            ], 404);
        }

        // Altrimenti, restituisci la gestione predefinita delle eccezioni.
        return parent::render($request, $exception);
    }


    // public function render($request, Exception $exception)
    // {
    //     // This will replace our 404 response with
    //     // a JSON response.
    //     if ($exception instanceof ModelNotFoundException) {
    //         return response()->json([
    //             'error' => 'Resource not found'
    //         ], 404);
    //     }

    //     return parent::render($request, $exception);
    // }

}
