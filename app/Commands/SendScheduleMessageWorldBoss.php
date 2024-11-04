<?php
// Dans app/Console/Commands/SendScheduledMessage.php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use Laracord\Discord\Interaction;

class SendScheduledMessage extends Command
{
    protected $signature = 'send:scheduled-message';
    protected $description = 'Envoie un message programmé sur Discord';

    public function handle()
    {
        $channelId = '1293158820465475584'; // Id channel discord
        $message = 'World Boss dans 10 minutes ';

        // Envoie le message
        Interaction::channel($channelId)->sendMessage($message);

        $this->info('Message envoyé avec succès !');
    }
}
