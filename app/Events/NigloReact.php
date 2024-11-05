<?php

namespace App\Events;

use Discord\Discord;
use Discord\Parts\Channel\Message;
use Discord\WebSockets\Event as Events;
use Laracord\Events\Event;
use Laracord\Commands\Command;
use Laracord\Discord\Interaction;

class NigloReact extends Event
{
    /**
     * The event handler.
     *
     * @var string
     */
    protected $handler = Events::MESSAGE_CREATE;

    /**
     * Handle the event.
     */
    public function handle(Message $message, Discord $discord)
    {
            // Récupère le contenu du message
        $msg = $message->content;

        // Vérifie si 'niglo' est présent dans le message (insensible à la casse)
        if (stripos($msg, 'niglo') !== false) {
            // Réagit avec l'emoji si 'niglo' est trouvé
            $message->react('🦔');
        }
    }
}
