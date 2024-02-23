<?php

use Illuminate\Database\Migrations\Migration; // Importa la classe Migration dal namespace Illuminate\Database\Migrations
use Illuminate\Database\Schema\Blueprint; // Importa la classe Blueprint dal namespace Illuminate\Database\Schema
use Illuminate\Support\Facades\Schema; // Importa la classe Schema dal namespace Illuminate\Support\Facades

return new class extends Migration // Restituisce una nuova istanza di una classe anonima che estende Migration
{
    /**
     * Esegue le migrazioni.
     */
    public function up() // Definisce il metodo up, che viene chiamato quando si esegue la migrazione
    {
        Schema::table('users', function (Blueprint $table) { // Utilizza il metodo table del Schema per definire la struttura della tabella 'users'
            $table->string('api_token', 60)->unique()->nullable(); // Aggiunge una colonna di tipo stringa chiamata 'api_token' con una lunghezza massima di 60 caratteri, univoca e consentendo valori nulli
        });
    }

    /**
     * Annulla le migrazioni.
     */
    public function down() // Definisce il metodo down, che viene chiamato quando si esegue il rollback della migrazione
    {
        Schema::table('users', function (Blueprint $table) { // Utilizza il metodo table del Schema per definire la struttura della tabella 'users'
            $table->dropColumn(['api_token']); // Rimuove la colonna 'api_token' dalla tabella 'users'
        });
    }
};
