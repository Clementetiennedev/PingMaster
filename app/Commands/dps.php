<?php

namespace App\Commands;

use Laracord\Commands\Command;
use Laracord\Discord\Interaction;
use Laracord\Discord\Components\Button;

class dps extends Command
{
    /**
     * The command name.
     *
     * @var string
     */
    protected $name = 'dps';

    /**
     * The command description.
     *
     * @var string
     */
    protected $description = 'Liste les builds dps';

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
            ->title('Liste build DPS')
            ->color('16711680')
            ->content('
                GS/Daggers : https://maxroll.gg/throne-and-liberty/build-guides/greatsword-dagger-pvp-build-guide
                
                Bow/Staff : https://maxroll.gg/throne-and-liberty/build-guides/longbow-staff-pvp-build-guide
                
                Bow/Daggers : https://maxroll.gg/throne-and-liberty/build-guides/longbow-dagger-pvp-build-guide
                
                Xbow/Daggers : https://maxroll.gg/throne-and-liberty/build-guides/crossbow-dagger-pvp-build-guide
                
                Staff/Daggers : https://maxroll.gg/throne-and-liberty/build-guides/staff-dagger-pvp-build-guide
                
                Wand/Staff (heal) : https://maxroll.gg/throne-and-liberty/build-guides/wand-staff-pvp-build-guide
                
                Wand/Daggers (heal) : https://maxroll.gg/throne-and-liberty/build-guides/wand-dagger-pvp-build-guide
                
                Voici une liste de build les + communs, mais pour des recherches approfondies allez sur le build editor !')
            ->button('Build Editor', 'https://throneandliberty.gameslantern.com/build-editor')
            ->send($message);
    }
}
