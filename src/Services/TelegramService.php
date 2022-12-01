<?php

declare(strict_types=1);

namespace GoCPA\LaravelTelegramChannelLogging\Services;

use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Http;

class TelegramService
{
    private string $baseUri;

    private ?int $messageId = null;

    /**
     * @param  string  $telegramBotToken
     * @param  string  $telegramChatId
     */
    public function __construct(
        private readonly string $telegramBotToken,
        private readonly string $telegramChatId,
    ) {
        $this->baseUri = 'https://api.telegram.org/bot'.$this->telegramBotToken.'/';
    }

    /**
     * @param  string  $message
     * @return void
     *
     * @throws GuzzleException
     */
    public function sendMessage(string $message): void
    {
        $endpoint = is_null($this->messageId) ? 'sendMessage' : 'sendMessage';

        $response = Http::post($this->baseUri.$endpoint, [
            'chat_id' => $this->telegramChatId,
            'parse_mode' => 'html',
            'text' => $message,
            'message_id' => $this->messageId,
        ]);

        $this->messageId = $response->json('result.message_id', null);
    }
}
