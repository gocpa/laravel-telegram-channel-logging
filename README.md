# Laravel Telegram logger

Send logs to Telegram channel via Telegram bot

## Install

```sh
composer require gocpa/laravel-telegram-channel-logging
```

Define Telegram Bot Token and chat id (users telegram id) and set as environment parameters.
Add to <b>.env</b>

```ini
TELEGRAM_CHANNEL_LOGGER_BOT_TOKEN=id:token
TELEGRAM_CHANNEL_LOGGER_CHAT_ID=chat_id
```

Add to <b>config/logging.php</b> file new channel:

```php
'telegram' => [
    'driver' => 'stack',
    'name' => 'telegram',
    'channels' => ['telegram_channel', 'telegram_log'],
],

'telegram_channel' => [
    'driver' => 'custom',
    'via' => GoCPA\LaravelTelegramChannelLogging\TelegramChannelDriver::class,
    'level' => env('LOG_LEVEL', 'debug'),
],

'telegram_log' => [
    'driver' => 'single',
    'path' => storage_path('logs/telegram.log'),
    'level' => env('LOG_LEVEL', 'debug'),
    'days' => 14,
],

```

Publish config file and views

```sh
php artisan vendor:publish --provider "GoCPA\LaravelTelegramChannelLogging\TelegramChannelLoggerServiceProvider"
```

## Telegram Logging Formats

You can choose among two different formats that you can specify in the `.env` file like this :

```ini
# Use a default log template
TELEGRAM_CHANNEL_LOGGER_TEMPLATE = laravel-telegram-logging::default
```

It is possible to create other blade templates and reference them in the `TELEGRAM_LOGGER_TEMPLATE` entry
