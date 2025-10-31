<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Models\ChatMessage;


class WuzApiService
{
    protected $baseUrl;
    protected $adminAuth;
    protected $apiKeyAuth;

    public function __construct()
    {
        $this->baseUrl    = rtrim(env('WUZAPI_BASE_URL', 'https://wuzapi.syscorban.com.br'), '/');
        $this->adminAuth  = env('WUZAPI_ADMIN_AUTH');
        $this->apiKeyAuth = env('WUZAPI_API_KEY_AUTH');
    }

    public function sendText($phone, $message)
    {
        $phone = ltrim($phone, '+'); // remove o + se vier

        $url = $this->baseUrl . '/chat/send/text';

        $payload = [
            'Phone' => $phone,
            'Body'  => $message,
        ];

        $headers = [
            'Authorization' => $this->adminAuth, // AdminAuth no header
            'token'         => $this->apiKeyAuth, // ApiKeyAuth no header
            'Accept'        => 'application/json',
        ];

        $response = Http::withHeaders($headers)->post($url, $payload);

        // dentro de sendText(), após o $response:
        ChatMessage::create([
            'chat_id' => $phone . '@s.whatsapp.net',
            'sender'  => 'me',
            'message' => $message,
            'from_me' => true,
            'sent_at' => now(),
        ]);

        Log::info('WuzAPI SEND TEXT', [
            'url'     => $url,
            'headers' => $headers,
            'payload' => $payload,
            'status'  => $response->status(),
            'body'    => $response->body(),
        ]);

        // retorna o JSON ou o corpo puro
        return $response->json() ?: $response->body();
    }
}
