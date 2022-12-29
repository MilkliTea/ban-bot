<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Nwilging\LaravelDiscordBot\Contracts\Notifications\DiscordNotificationContract;
use Nwilging\LaravelDiscordBot\Support\Builder\ComponentBuilder;
use Nwilging\LaravelDiscordBot\Support\Builder\EmbedBuilder;

class Discord extends Notification implements DiscordNotificationContract
{
    use Queueable;

    public function via($notifiable)
    {
        return ['discord'];
    }

    public function toDiscord($notifiable): array
    {
        $channelId = '1057996444977606726';
        $embedBuilder = new EmbedBuilder();
        $embedBuilder->addAuthor('/@!');

        $componentBuilder = new ComponentBuilder();
        $componentBuilder->addActionButton('Kullanıcı Banlansn mı', 'customId');

        return [
            'contentType' => 'rich',
            'channelId' => $channelId,
            'embeds' => $embedBuilder->getEmbeds(),
            'components' => [
                $componentBuilder->getActionRow()->getType(),
            ],
        ];
    }
}
