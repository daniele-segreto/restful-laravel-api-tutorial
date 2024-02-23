<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        // Qui la richiesta viene validata. Il metodo validator si trova
        // all'interno del RegisterController e si assicura che i campi
        // nome, email, password e password_confirmation siano obbligatori.
        $this->validator($request->all())->validate();

        // Viene creato un evento Registered che attiverà tutti gli osservatori
        // rilevanti, come l'invio di una email di conferma o qualsiasi
        // codice che deve essere eseguito non appena l'utente viene creato.
        event(new Registered($user = $this->create($request->all())));

        // Dopo che l'utente è stato creato, viene effettuato il login.
        $this->guard()->login($user);

        // E infine questo è l'hook che vogliamo. Se non c'è un metodo registered()
        // o restituisce null, reindirizzalo verso un'altra URL. Nel nostro caso,
        // è sufficiente implementare quel metodo per restituire la risposta corretta.
        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }

    protected function registered(Request $request, $user)
    {
        // Genera un token per l'utente appena registrato.
        $user->generateToken();

        // Restituisce una risposta JSON che contiene i dati dell'utente
        // appena registrato con uno status code 201 (Created).
        return response()->json(['data' => $user->toArray()], 201);
    }
}
