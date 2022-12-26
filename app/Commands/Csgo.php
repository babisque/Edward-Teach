<?php

namespace App\Edward\Commands;

use Discord\Discord;
use Discord\Parts\Channel\Message;

class Csgo
{
    public function execute(Message $message, $argument, $discord)
    {
        $uri = 'https://api.steampowered.com/ICSGOServers_730/GetGameServersStatus/v1/?access_token=';
        $json = json_decode(@file_get_contents($uri . $_ENV['STEAM_ACCESS_TOKEN']));
        $brazil = $json->result->datacenters->Brazil->load;

        $channel = $discord->getChannel($message->channel_id);
        $channel->sendMessage("Os servidores no Brasil estão {$brazil}");
    }
}