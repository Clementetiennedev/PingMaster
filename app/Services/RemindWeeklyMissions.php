<?php

namespace App\Services;

use Laracord\Services\Service;
use Carbon\Carbon;
use React\EventLoop\Loop;

class RemindWeeklyMissions extends Service
{
    protected $messageSunday = "C'est dimanche, préparez-vous pour la semaine à venir!";
    protected $messageMonday = "Les missions hebdomadaires sont finies dans 24h !";

    /**
     * Handle the service.
     *
     * @return void
     */
    public function handle(): void
    {
        $loop = Loop::get();
        
        // Programmer l'envoi du message dimanche à 21h
        $this->scheduleMessage('Sunday', 'Serveurs US East', $this->messageSunday, 21, 0);
        
        // Programmer l'envoi du message lundi à 21h
        $this->scheduleMessage('Monday', 'Serveurs EU',  $this->messageMonday, 21, 0);
    }

    /**
     * Schedule a message to be sent at a specific time.
     *
     * @param string $dayOfWeek The day of the week (e.g. 'Sunday', 'Monday').
     * @param string $message The message to send.
     * @param int $hour The hour to send the message.
     * @param int $minute The minute to send the message.
     * @return void
     */
    protected function scheduleMessage($dayOfWeek, $server, $message, $hour, $minute): void
    {
        $now = Carbon::now('Europe/Paris');
        
        // Trouver la date et l'heure du prochain jour spécifique (dimanche ou lundi)
        $nextEvent = Carbon::parse("next $dayOfWeek $hour:$minute");
        // Si l'heure est déjà passée aujourd'hui, ajuster pour la semaine prochaine
        if ($nextEvent->isPast()) {
            $nextEvent->addWeek();
        }

        // Calculer le délai jusqu'au prochain message
        $delay = $now->diffInSeconds($nextEvent, false);
        
        // Planifier l'envoi du message avec un délai
        Loop::addTimer($delay, function() use ($message) {
            $this->sendMessage($message, $server);
        });
    }

    /**
     * Send the message with an embed.
     *
     * @param string $message
     * @return void
     */
    protected function sendMessage($message, $server): void
    {
            $this->message()
            ->title("Rappel des missions hebdomadaires")
            ->authorName('')
            ->authorIcon('')
            ->authorUrl('')
            ->field($server, '')
            ->content($this->messageMonday)
            ->body("<@&1289539521603698698>")
            ->footerText("Ne manquez pas cette occasion !")
            ->send('1293158820465475584');
    }
}
