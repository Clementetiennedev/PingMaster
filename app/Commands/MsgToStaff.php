<?php

namespace App\Commands;

use Laracord\Commands\Command;
use Laracord\Discord\Message;

class MsgToStaff extends Command
{
    /**
     * The command name.
     *
     * @var string
     */
    protected $name = 'msg';

    /**
     * The command description.
     *
     * @var string
     */
    protected $description = 'Envoie un message privée au staff';

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
        $content = implode(' ', $args);
        $channelId = '1303017838747062434';
        $author = $message->member;
        // Vérifier que le message n'est pas vide
        if (empty($content)) 
        {
            $this
                ->message('⛔️ Le message est vide ! Remplissez bien le contenu de votre message ⛔️')
                ->authorName('')
                ->authorIcon('')
                ->authorUrl('')
                ->sendTo($author->id);
            $message->delete();
            return;
        }else{
            $this
                ->message('✅ Le message a bien été envoyé ! Merci de ta confiance ✅')
                ->authorName('')
                ->authorIcon('')
                ->authorUrl('')
                ->sendTo($author->id);
        }

        //Renvoie un message construit dans un channel privée ou le staff gere
        if($author->nick){
            $this
            ->message("Message de **{$author->nick}** :\n{$content}")
            ->send($channelId);
            $message->delete();
        } else {
            $this
            ->message("Message de **{$author->username}** :\n{$content}")
            ->send($channelId);
            $message->delete();
        }
    }

}
