<?php

namespace App\Commands;

use Laracord\Commands\Command;

class healer extends Command
{
    /**
     * The command name.
     *
     * @var string
     */
    protected $name = 'healer';

    /**
     * The command description.
     *
     * @var string
     */
    protected $description = 'Liste les builds healer';

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
            ->title('Liste build HEALER')
            ->color('32768')
            ->content('
                Bow/Wand : https://maxroll.gg/throne-and-liberty/build-guides/wand-longbow-pvp-build-guide
            
                Wand/Staff (Dps) : https://maxroll.gg/throne-and-liberty/build-guides/wand-staff-pvp-build-guide
                
                Voici une liste de build les + communs, mais pour des recherches approfondies allez sur le build editor !')
            ->button('Build Editor', 'https://throneandliberty.gameslantern.com/build-editor')
            ->send($message);
    }
}
