<?php

namespace GoCPA\LaravelTelegramChannelLogging\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;
use GoCPA\LaravelTelegramChannelLogging\LaravelTelegramChannelLoggingServiceProvider;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'GoCPA\\LaravelTelegramChannelLogging\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            LaravelTelegramChannelLoggingServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_laravel-telegram-channel-logging_table.php.stub';
        $migration->up();
        */
    }
}
