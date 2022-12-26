<?php

namespace App\Edward\Events;

use App\Edward\Service\CommandHandler;
use Discord\Discord;
use Discord\Parts\Channel\Message;

class MessageCreate
{
    protected $commandHandler;

    public function __construct(private Discord $discord)
    {
    }

    public function handleMessageCreate(Message $message)
    {
        $this->commandHandler = new CommandHandler();

        if ($message->author->id == $this->discord->user->id) return;

        if (stripos($message->content, '!') === 0) {
            $pieces = explode(' ', $message->content);
            $command = strtolower(array_shift($pieces));
            $command = str_replace("!", "", $command);
            $arguments = $pieces;
            
            $this->commandHandler->handle($command, $arguments, $message, $this->discord);
        }
    }
}