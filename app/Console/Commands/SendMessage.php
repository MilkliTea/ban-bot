<?php

namespace App\Console\Commands;

use App\Models\Guild;
use App\Notifications\Discord;
use Illuminate\Console\Command;
use Nwilging\LaravelDiscordBot\Contracts\Services\DiscordInteractionServiceContract;

class SendMessage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'discord';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $guild = Guild::findOrFail(1);
        $guild->notify(new Discord());
    }
}
