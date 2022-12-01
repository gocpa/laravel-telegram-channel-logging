<?php

declare(strict_types=1);

namespace GoCPA\LaravelTelegramChannelLogging\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

class TelegramService
{
    private Client $client;

    /**
     * @param string $telegramBotToken
     * @param string $telegramChatId
     */
    public function __construct(
        private readonly string $telegramBotToken,
        private readonly string $telegramChatId,
    ) {
        $baseUri = 'https://api.telegram.org/bot' . $this->telegramBotToken . '/';

        $this->client = new Client([
            'base_uri' => $baseUri,
        ]);
    }

    /**
     * @param string $message
     * @return void
     * @throws GuzzleException
     */
    public function sendMessage(string $message): void
    {
        $this->client->post('sendMessage', [
            'query' => [
                'chat_id' => $this->telegramChatId,
                'parse_mode' => 'html',
                'text' => $message,
            ],
        ]);
    }
}
