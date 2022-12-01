<?php

declare(strict_types=1);

namespace GoCPA\LaravelTelegramChannelLogging;

use GoCPA\LaravelTelegramChannelLogging\Services\TelegramService;
use GuzzleHttp\Exception\GuzzleException;
use Monolog\Handler\AbstractProcessingHandler;
use Monolog\Logger;

class TelegramChannelHandler extends AbstractProcessingHandler
{
    private string $appName;
    private string $appEnv;
    private TelegramService $telegramService;

    /**
     * TelegramHandler constructor.
     *
     * @param  array  $config
     */
    public function __construct(array $config)
    {
        $monologLevel = Logger::toMonologLevel($config['level']);
        parent::__construct($monologLevel);

        $this->appName = config('app.name');
        $this->appEnv = config('app.env');

        $this->telegramService = new TelegramService(
            config('telegram-channel-logger.bot_token'),
            config('telegram-channel-logger.chat_id')
        );
    }

    /**
     * Send log text to Telegram
     *
     * @param array $record
     * @return void
     * @throws GuzzleException
     */
    protected function write(array $record): void
    {
        $template = config('telegram-channel-logger.template');

        $message = view($template, array_merge($record, [
            'appName' => $this->appName,
            'appEnv'  => $this->appEnv,
        ]))->render();

        $this->telegramService->sendMessage($message);
    }
}
