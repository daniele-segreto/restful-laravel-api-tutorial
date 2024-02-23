<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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

    public function logout(Request $request)
    {
        // Ottiene l'utente autenticato attraverso il guard 'api'.
        $user = Auth::guard('api')->user();

        // Verifica se l'utente è autenticato.
        if ($user) {
            // Se l'utente è autenticato, imposta il token API a null per invalidarlo.
            $user->api_token = null;

            // Salva le modifiche dell'utente nel database.
            $user->save();
        }

        // Restituisce una risposta JSON per confermare il logout.
        return response()->json(['data' => 'User logged out.'], 200);
    }

    Auth::guard('api')->user(); // istanza dell'utente loggato
    Auth::guard('api')->check(); // se un utente è autenticato
    Auth::guard('api')->id(); // l'id dell'utente autenticato

}
