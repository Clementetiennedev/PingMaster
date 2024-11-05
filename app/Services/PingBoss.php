<?php

namespace App\Services;

use Laracord\Services\Service;
use Carbon\Carbon;

class PingBoss extends Service
{
    /**
     * The service interval.
     */
    protected int $interval = 60;
    protected array $sendTimes = ['11:50', '14:50', '17:50', '20:50', '23:50'];
    /**
     * Handle the service.
     */
    public function handle(): void
    {
        $now = Carbon::now('Europe/Paris')->format('H:i');
        $channel = ('1293164221575725066');
        $eventLogo = 'https://gameslantern.com/storage/sites/throne-and-liberty/events/wolf-hunting-contest-1-1.png';
        $bossLogo = "https://gameslantern.com/storage/sites/throne-and-liberty/events/manticus-1-8.png";
        $WorldBossRoleId = "1295317528251338835";
    
        
        if (in_array($now, $this->sendTimes)) {
           $this
                ->message()
                ->title("Les World Boss apparaitront dans 10 minutes")
                ->content('')
                ->body("<@&$WorldBossRoleId>")
                ->authorName('')
                ->authorIcon('')
                ->authorUrl('')
                ->imageUrl($bossLogo)
                ->field('Servers :', 'All EU servers')
                ->field('', '')
                ->color(16711680)
                ->footerText('Contact Staff for suggestions')
                ->timestamp(now())
                ->send($channel);
        
    }
}

}
