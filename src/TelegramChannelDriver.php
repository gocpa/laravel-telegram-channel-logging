<?php

declare(strict_types=1);

namespace GoCPA\LaravelTelegramChannelLogging;

use Monolog\Logger;

class TelegramChannelDriver
{
    /**
     * Create a custom Monolog instance.
     *
     * @param  array  $config
     * @return Logger
     */
    public function __invoke(array $config): Logger
    {
        return new Logger(
            config('app.name'),
            [new TelegramChannelHandler($config)]
        );
    }
}
