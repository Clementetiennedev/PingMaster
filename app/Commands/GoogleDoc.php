<?php

namespace App\Commands;

use Laracord\Commands\Command;

class GoogleDoc extends Command
{
    /**
     * The command name.
     *
     * @var string
     */
    protected $name = 'gdoc';

    /**
     * The command description.
     *
     * @var string
     */
    protected $description = 'Avoir les liens des gdoc';

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
        return $this
            ->message()
            ->title('Liste des liens Google Doc')
            ->content('DKP/WorldBoss : https://docs.google.com/spreadsheets/d/1uIz_mRvwPzU1SM17gNQchy3quw3R8IO05r4bTT2sGJA/edit?gid=1823348681#gid=1823348681
            
            Guide quotidienne : https://docs.google.com/document/d/1xuAFy7wAOJ-tkh0fGnucRbJns_Ob7ELlucCo7SNAqg0/edit?tab=t.0')
            ->send($message);
    }
}
