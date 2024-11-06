<?php

namespace App\Commands;

use Laracord\Commands\Command;
use Carbon\Carbon;
use React\EventLoop\Loop;

class Weekly extends Command
{
    protected $weeklyTime = '21:00'; // Heure de l'événement pour les deux serveurs
    protected $euEventDay = 'Tuesday'; // Jour de l'événement pour EU
    protected $usEventDay = 'Monday'; // Jour de l'événement pour US East

    protected $name = 'weekly';
    protected $description = 'Voir quand arrivent les weekly';
    protected $admin = false;
    protected $hidden = false;

    public function handle($message, $args)
    {
        Carbon::setLocale('fr');
        $now = Carbon::now('Europe/Paris');

        // Calcul du prochain événement pour chaque serveur
        $nextEUEvent = $this->getNextEvent($now, $this->euEventDay);
        $nextUSEvent = $this->getNextEvent($now, $this->usEventDay);

        // Temps restants formatés pour chaque événement
        $remainingTimeEU = $this->getTimeDifference($now, $nextEUEvent);
        $remainingTimeUS = $this->getTimeDifference($now, $nextUSEvent);

        $botMessage = $this->message()
            ->authorName('')
            ->authorIcon('')
            ->authorUrl('')
            ->field('Serveur EU :', "Prochaine récompenses hebdomadaire le __" . $nextEUEvent->translatedFormat('l, d F Y à H:i') . ".__\n" .
            "Reste **$remainingTimeEU** pour finir vos missions !")
            ->field('Serveur US East :', "Prochaine récompenses hebdomadaire le __" . $nextUSEvent->translatedFormat('l, d F Y à H:i') . ".__\n" .
            "Reste **$remainingTimeUS** pour finir vos missions !")
            ->title("Récompense hebdomadaire")
            ->footerText("Ce message se supprimera dans 1 minute")
            ->thumbnailUrl("https://preview.redd.it/weekly-reward-system-you-can-only-select-one-v0-bmm1oet4uptd1.jpeg?auto=webp&s=6390dd66bfba00b9f7f4149963c6364179389d86")
            ->send($message)
            ->then(function($botMessage) {
                // Supprimer le message après 10 secondes
                Loop::addTimer(60, function() use ($botMessage) {
                    $botMessage->delete();
                });
            });
    }

    /**
     * Trouver la prochaine occurrence d'un événement à 21h pour un jour donné.
     *
     * @param \Carbon\Carbon $now
     * @param string $dayOfWeek
     * @return \Carbon\Carbon
     */
    private function getNextEvent(Carbon $now, string $dayOfWeek): Carbon
    {
        // Créer l'instance pour le jour donné à 21h
        $nextEvent = Carbon::parse("next $dayOfWeek " . $this->weeklyTime);

        // Si l'événement est aujourd'hui, mais déjà passé, avancer d'une semaine
        if ($nextEvent->lessThanOrEqualTo($now)) {
            $nextEvent->addWeek();
        }

        return $nextEvent;
    }

    /**
     * Calculer le temps restant en "dd:hh:mm".
     *
     * @param \Carbon\Carbon $now
     * @param \Carbon\Carbon $nextEvent
     * @return string
     */
    private function getTimeDifference(Carbon $now, Carbon $nextEvent): string
    {
        $days = $now->diffInDays($nextEvent);
        $hours = $now->diffInHours($nextEvent) % 24;
        $minutes = $now->diffInMinutes($nextEvent) % 60;

        return sprintf('%02d jours %02d heures %02d minutes', $days, $hours, $minutes);

    }
}
