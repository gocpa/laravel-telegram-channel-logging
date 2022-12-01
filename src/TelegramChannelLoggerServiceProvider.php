<?php

declare(strict_types=1);

namespace GoCPA\LaravelTelegramChannelLogging;

use Illuminate\Support\ServiceProvider;

class TelegramChannelLoggerServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/telegram-channel-logger.php',
            'telegram-channel-logger'
        );
    }

    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->loadViewsFrom(
            __DIR__ . '/views',
            'telegram-channel-logger'
        );
        $this->publishes(
            [__DIR__ . '/../config/telegram-channel-logger.php' => config_path('telegram-channel-logger.php')],
            'config'
        );
        $this->publishes(
            [__DIR__ . '/views' => base_path('resources/views/vendor/telegram-channel-logger')],
            'views'
        );
    }
}
