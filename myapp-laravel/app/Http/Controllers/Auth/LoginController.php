<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    // Questo codice rappresenta il metodo login() all'interno del LoginController. Esso gestisce il processo di autenticazione degli utenti e genera un token API per l'utente autenticato. Se il login ha successo, restituisce i dati dell'utente come risposta JSON, altrimenti restituisce una risposta di errore.
    public function login(Request $request)
    {
        // Valida i dati inviati con la richiesta di login.
        $this->validateLogin($request);

        // Effettua il tentativo di login utilizzando i dati forniti.
        if ($this->attemptLogin($request)) {
            // Se il login ha avuto successo, ottieni l'utente autenticato.
            $user = $this->guard()->user();

            // Genera un token API per l'utente.
            $user->generateToken();

            // Restituisci i dati dell'utente autenticato come risposta JSON.
            return response()->json([
                'data' => $user->toArray(),
            ]);
        }

        // Se il login fallisce, restituisci una risposta di errore.
        return $this->sendFailedLoginResponse($request);
    }
}
