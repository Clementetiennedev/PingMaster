<?php

namespace App\Commands;

use Laracord\Commands\Command;
use Carbon\Carbon;

class BossSchedule extends Command
{
    /**
     * The command name.
     *
     * @var string
     */
    protected $name = 'boss';

    /**
     * The command description.
     *
     * @var string
     */
    protected $description = 'Pour savoir quand arrive le prochain boss';

    /**
     * Determines whether the command requires admin permissions.
     *
     * @var bool
     */
    protected $admin = false;

    /**
     * Determines whether the command should be displayed in the commands list.
     *
     * @var bool
     */
    protected $hidden = false;

    /**
     * Handle the command.
     *
     * @param  \Discord\Parts\Channel\Message  $message
     * @param  array  $args
     * @return void
     */
    public function handle($message, $args)
    {
        // Liste des heures d'événements (24 heures)
        $eventHours = ['12:00', '15:00', '18:00', '21:00', '00:00'];

        // Heure actuelle
        $now = Carbon::now();

        // Convertir les heures d'événements en objets Carbon pour aujourd'hui et demain
        $events = [];
        foreach ($eventHours as $time) {
            $eventToday = Carbon::createFromTimeString($time);
            if ($eventToday->greaterThan($now)) {
                $events[] = $eventToday;
            }
        }

        // Ajouter les événements du lendemain si aucun n'est prévu aujourd'hui
        if (empty($events)) {
            foreach ($eventHours as $time) {
                $events[] = Carbon::createFromTimeString($time)->addDay();
            }
        }

        // Trouver le prochain événement
        $nextEvent = collect($events)->sort()->first();

        // Calculer le temps restant
        $diff = $nextEvent->diffForHumans($now, true);

        // Afficher le temps jusqu'au prochain événement
        $this
        ->message("Le prochain **WORLDBOSS** est dans $diff , à " . $nextEvent->format('H:i'))
        ->title('ALERTE **WORLD BOSS** @Vassal')
        ->send($message);
    }
}
