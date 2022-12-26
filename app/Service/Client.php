<?php

namespace App\Edward\Service;

use App\Edward\Events\MemberAdd;
use App\Edward\Events\MessageCreate;
use Discord\Discord;
use Discord\WebSockets\Intents;

class Client
{
    public function __construct()
    {
        $discord = new Discord([
            'token' => $_ENV['BOT_TOKEN'],
            'intents' => Intents::getAllIntents()
        ]);

        $discord->on('ready', function ($discord) {
            $messageCreateHandler = new MessageCreate($discord);
            $memberAddHandler = new MemberAdd($discord);

            $discord->on('MESSAGE_CREATE', [$messageCreateHandler, 'handleMessageCreate']);
            $discord->on('GUILD_MEMBER_ADD', [$memberAddHandler, 'handleMemberAdd']);

            echo "Bot is running" . PHP_EOL;
        });

        $discord->run();
    }
}
