<?php

namespace App\Edward\Events;

use Discord\Discord;
use Discord\Parts\User\Member;
use Discord\Parts\Embed\Embed;

class MemberAdd
{
    public function __construct(private Discord $discord)
    {
    }

    public function handleMemberAdd(Member $member)
    {
        if ($member->user->bot) return;

        $member->addRole('932670120952729671');

        $embed = new Embed($this->discord);
                $embed
                    ->setTitle('Ahoy, marujo!')
                    ->setDescription("Seja bem vindo a bordo!\nPegue sua garrafa de Rum e venha saquear navios com a tripulação, <@{$member->user->id}>!")
                    ->setColor('#eca104')
                    ->setTimestamp()
                    ->setThumbnail("{$member->user->avatar}");

                $channel = $this->discord->getChannel('932675724089905232');
                $channel->sendMessage('', false, $embed);
    }
}