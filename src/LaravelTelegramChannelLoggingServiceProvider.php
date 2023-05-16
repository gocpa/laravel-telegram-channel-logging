<?php

namespace GoCPA\LaravelTelegramChannelLogging;

use GoCPA\LaravelTelegramChannelLogging\Commands\LaravelTelegramChannelLoggingCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelTelegramChannelLoggingServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-telegram-channel-logging')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-telegram-channel-logging_table')
            ->hasCommand(LaravelTelegramChannelLoggingCommand::class);
    }
}
