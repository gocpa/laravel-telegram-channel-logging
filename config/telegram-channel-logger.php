<?php

return [
    'bot_token' => env('TELEGRAM_CHANNEL_LOGGER_BOT_TOKEN'),
    'chat_id' => env('TELEGRAM_CHANNEL_LOGGER_CHAT_ID'),
    'template' => env('TELEGRAM_CHANNEL_LOGGER_TEMPLATE', 'telegram-channel-logger::default'),
];
