<?php

namespace App\Services;

use Laracord\Services\Service;
use Carbon\Carbon;

class PingDynamicEvent extends Service
{
    /**
     * The service interval.
     */
    protected int $interval = 60;
    protected array $sendTimes = ['01:50', '04:50', '7:50', '10:50', '13:50', '16:50', '19:50', '22:50'];
    /**
     * Handle the service.
     */
    public function handle(): void
    {
        $now = Carbon::now('Europe/Paris')->format('H:i');
        $channel = $this->discord()->getChannel('1293158820465475584');
        $eventLogo = 'https://gameslantern.com/storage/sites/throne-and-liberty/events/wolf-hunting-contest-1-1.png';
        $bossLogo = "https://gameslantern.com/storage/sites/throne-and-liberty/events/manticus-1-8.png";
        $WorldBossRoleId = "1295317528251338835";
    
        
        if (in_array($now, $this->sendTimes)) {
           $this
                ->message()
                ->title("Les events dynamique apparaitront dans 10 minutes")
                ->content('')
                ->authorName('')
                ->authorIcon('')
                ->authorUrl('')
                ->imageUrl($eventLogo)
                ->field('Servers :', 'All EU servers')
                ->field('', '')
                ->color(65535)
                ->footerText('Contact Staff for suggestions')
                ->timestamp(now())
                ->send($channel);
        
    }
}

}
