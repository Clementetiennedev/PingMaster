<?php
// Dans app/Console/Kernel.php
namespace App\Console;

use App\Console\Commands\SendScheduledMessage;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule)
    {
        // Planifie l'envoi du message tous les jours à 14h00 (ou à l'heure de ton choix)
        $schedule->command(SendScheduledMessage::class)->dailyAt('14:00');
    }

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');
    }
}
