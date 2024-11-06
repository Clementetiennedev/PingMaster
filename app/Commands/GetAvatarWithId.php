<?php

namespace App\Commands;

use Laracord\Commands\Command;

class GetAvatarWithId extends Command
{
    /**
     * The command name.
     *
     * @var string
     */
    protected $name = 'avatar';

    /**
     * The command description.
     *
     * @var string
     */
    protected $description = 'The get-avatar-with-id command.';

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
        $userInfo = implode(' ', $args);
        if (empty($args)) {
            $message->reply("Veuillez fournir l'ID de l'utilisateur.");
            return;
        }else{
            $user = $this->discord()->users->get('id', $userInfo);
        }
            
            
        return $this
            ->message()
            ->authorName('')
            ->authorIcon('')
            ->authorUrl('')
            ->title("Avatar d'un membre")
            ->content("Voici l'url de l'avatar:" . $user->avatar)
            ->send($message);
    }
}
