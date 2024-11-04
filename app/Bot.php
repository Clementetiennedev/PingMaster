<?php

namespace App;

use Illuminate\Support\Facades\Route;
use Illuminate\Console\Scheduling\Schedule;
use Laracord\Laracord;
use Laracord\Discord\Interaction; // Ajoutez cela pour l'interaction

class Bot extends Laracord
{
    /**
     * Les routes HTTP.
     */
    public function routes(): void
    {
        Route::middleware('web')->group(function () {
            // Routes spécifiques à votre application
        });

        Route::middleware('api')->group(function () {
            // Routes API si nécessaire
        });
    }

    /**
     * Planification des tâches.
     */
    protected function schedule(Schedule $schedule)
    {
        // Planifie l'envoi d'un message toutes les minutes
        $schedule->call(function () {
            $channelId = '1293158820465475584'; // ID du canal Discord
            $message = 'Hello world!';

            // Envoie le message avec un timestamp
            Interaction::channel($channelId)
                ->sendMessage($message); // Envoie le message

            echo "Message envoyé : $message à " . now() . "\n"; // Affiche le message dans la console
        })->everyMinute(); // Changez cette ligne pour la fréquence souhaitée
    }
}
