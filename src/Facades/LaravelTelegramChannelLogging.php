<?php

namespace GoCPA\LaravelTelegramChannelLogging\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \GoCPA\LaravelTelegramChannelLogging\LaravelTelegramChannelLogging
 */
class LaravelTelegramChannelLogging extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \GoCPA\LaravelTelegramChannelLogging\LaravelTelegramChannelLogging::class;
    }
}
