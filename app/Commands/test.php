<?php

namespace App\Commands;

use Laracord\Commands\Command;

class test extends Command
{
    /**
     * The command name.
     *
     * @var string
     */
    protected $name = 'test';

    /**
     * The command description.
     *
     * @var string
     */
    protected $description = 'The test command.';

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
            ->title('test')
            ->message('Pick a select, any select!')
            ->select(type: 'channel', route: 'handleChannel')
            ->select(type: 'mentionable', route: 'handleMentionable')
            ->select(type: 'role', route: 'handleRole')
            ->select(type: 'user', route: 'handleUser')
            ->send($message);
    }
}
