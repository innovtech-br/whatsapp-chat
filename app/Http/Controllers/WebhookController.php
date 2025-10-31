<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\ChatMessage;


class WebhookController extends Controller
{
    public function receive(Request $request)
    {
        Log::info('Webhook recebido:', $request->all());

        $data = $request->all();

        if (isset($data['event']['Info'])) {
            $info = $data['event']['Info'];
            $message = $data['event']['Message']['extendedTextMessage']['text'] ?? null;

            if ($message) {
                $chatMessage = ChatMessage::create([
                    'chat_id' => $info['Chat'],
                    'sender'  => $info['Sender'] ?? null,
                    'message' => $message,
                    'from_me' => false,
                    'sent_at' => $info['Timestamp'] ?? now(),
                ]);

                event(new \App\Events\NewChatMessage($chatMessage));

            }
        }

        return response()->json(['status' => 'ok']);
    }
}


