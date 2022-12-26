<?php

namespace App\Edward\Commands;

use Discord\Discord;
use Discord\Parts\Channel\Message;

class Ping
{
    public function execute(Message $message)
    {
        $message->reply("Pong");
    }
}