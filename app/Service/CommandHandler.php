<?php

namespace App\Edward\Service;

use Discord\Parts\Channel\Message;
use App\Edward\Commands\Ping;
use App\Edward\Commands\Csgo;

class CommandHandler
{
    protected $commands = [
        'ping' => Ping::class,
        'csgostatus' => Csgo::class,
    ];

    public function handle($command, $arguments, Message $message, $discord)
    {
        if (isset($this->commands[$command])) {
            $commandClass = $this->commands[$command];
            $command = new $commandClass();
            $command->execute($message, $arguments, $discord);
        }
    }
}