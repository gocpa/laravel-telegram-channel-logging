<?php

namespace GoCPA\LaravelTelegramChannelLogging\Commands;

use Illuminate\Console\Command;

class LaravelTelegramChannelLoggingCommand extends Command
{
    public $signature = 'laravel-telegram-channel-logging';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
