<?php

namespace App\Commands;

use Laracord\Commands\Command;

class tank extends Command
{
    /**
     * The command name.
     *
     * @var string
     */
    protected $name = 'tank';

    /**
     * The command description.
     *
     * @var string
     */
    protected $description = 'Liste les builds tank';

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
            ->title('Liste build TANK')
            ->color('16767296')
            ->content('
                SNS/GS : https://maxroll.gg/throne-and-liberty/build-guides/sword-and-shield-greatsword-pvp-build-guide
            
                SNS-Wand : https://maxroll.gg/throne-and-liberty/build-guides/sword-and-shield-wand-pvp-guide
                
                Voici une liste de build les + communs, mais pour des recherches approfondies allez sur le build editor !')
            ->button('Build Editor', 'https://throneandliberty.gameslantern.com/build-editor')
            ->send($message);
    }
}
