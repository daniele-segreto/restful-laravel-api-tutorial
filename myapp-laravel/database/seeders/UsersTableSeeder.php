<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Notifications\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Prima puliamo la tabella degli utenti
        User::truncate();

        $faker = \Faker\Factory::create();

        // Assicuriamoci che tutti abbiano la stessa password e
        // eseguiamo l'hashing prima del ciclo, altrimenti il nostro seeder
        // sarà troppo lento.
        $password = Hash::make('toptal');

        User::create([
            'name' => 'Administrator',
            'email' => 'admin@test.com',
            'password' => $password,
        ]);

        // E ora generiamo qualche dozzina di utenti per la nostra app:
        for ($i = 0; $i < 10; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => $password,
            ]);
        }
    }
}
