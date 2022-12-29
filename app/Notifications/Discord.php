<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification;
use Nwilging\LaravelDiscordBot\Contracts\Notifications\DiscordNotificationContract;
use Nwilging\LaravelDiscordBot\Support\Builder\ComponentBuilder;
use Nwilging\LaravelDiscordBot\Support\Builder\EmbedBuilder;
use Nwilging\LaravelDiscordBot\Support\Component;
use Nwilging\LaravelDiscordBot\Support\Components\ButtonComponent;
use Nwilging\LaravelDiscordBot\Support\Embed;
use Nwilging\LaravelDiscordBot\Support\Interactions\DiscordInteractionResponse;
use Nwilging\LaravelDiscordBot\Channels\DiscordNotificationChannel;
use Nwilging\LaravelDiscordBot\Contracts\Services\DiscordApiServiceContract;

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
        $embedBuilder->addAuthor('/alper');

        $componentBuilder = new ComponentBuilder();
        $componentBuilder->addLinkButton('Banla', 'https://kommunity.com/');
        $component = new ButtonComponent('Banla', 'custom-id');
        $component->withDangerStyle();
        $componentBuilder->addActionButton('Banla', 'custom-id');
        $this->kick();
        return [
            'contentType' => 'rich',
            'channelId' => $channelId,
            'embeds' => $embedBuilder->getEmbeds(),
            'components' => [
                $componentBuilder->getActionRow(),
            ],
        ];
    }

    //butona tıklandığı zaman çalışması gerekiyor
    public function kick()
    {
        $response = new DiscordInteractionResponse(1);

        return true;
    }
}
