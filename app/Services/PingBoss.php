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
    protected array $sendTimes = ['12:50', '15:50', '19:50', '21:50', '00:50'];
    /**
     * Handle the service.
     */
    public function handle(): void
    {
        $now = Carbon::now('Europe/Paris')->format('H:i');
        $channel = ('1293164221575725066');
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
                ->thumbnailUrl($bossLogo)
                ->field('Servers :', 'All EU servers')
                ->field('', '')
                ->color(16711680)
                ->footerText('Contact Staff for suggestions')
                ->timestamp(now())
                ->send($channel);
        
    }
}

}
