<?php

declare(strict_types=1);

namespace GoCPA\LaravelTelegramChannelLogging;

use GoCPA\LaravelTelegramChannelLogging\Services\TelegramService;
use GuzzleHttp\Exception\GuzzleException;
use Monolog\Handler\AbstractProcessingHandler;
use Monolog\Logger;

class TelegramChannelHandler extends AbstractProcessingHandler
{
    private TelegramService $telegramService;

    private string $text = '';

    /**
     * TelegramHandler constructor.
     *
     * @param  array  $config
     */
    public function __construct(array $config)
    {
        $monologLevel = Logger::toMonologLevel($config['level']);

        $this->telegramService = new TelegramService(
            config('telegram-channel-logger.bot_token'),
            config('telegram-channel-logger.chat_id')
        );
        parent::__construct($monologLevel);

        $templateHeader = config('telegram-channel-logger.template_header');
        $header = view($templateHeader, [
            'appName' => config('app.name'),
            'appEnv' => config('app.env'),
        ])->render();
        $this->text .= $header.PHP_EOL;
    }

    /**
     * Send log text to Telegram
     *
     * @param  array  $record
     * @return void
     *
     * @throws GuzzleException
     */
    protected function write(array $record): void
    {
        try {
            $template = config('telegram-channel-logger.template');
            $message = view($template, ['message' => 'test'])->render();
            $this->text .= $message.PHP_EOL;

            $this->telegramService->sendMessage($this->text);
        } catch (\Throwable $th) {
            dd($th);
            //throw $th;
        }
    }
}
