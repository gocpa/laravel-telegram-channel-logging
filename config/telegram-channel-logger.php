<?php

return [
    'bot_token' => env('TELEGRAM_CHANNEL_LOGGER_BOT_TOKEN'),
    'chat_id' => env('TELEGRAM_CHANNEL_LOGGER_CHAT_ID'),
    'template_header' => env('TELEGRAM_CHANNEL_LOGGER_TEMPLATE', 'telegram-channel-logger::header'),
    'template' => env('TELEGRAM_CHANNEL_LOGGER_TEMPLATE', 'telegram-channel-logger::default'),
];
