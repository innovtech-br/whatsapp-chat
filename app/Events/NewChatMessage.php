<?php

namespace App\Events;

use App\Models\ChatMessage;
use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewChatMessage implements ShouldBroadcast
{
    use Dispatchable, SerializesModels;

    public $message;

    public function __construct(ChatMessage $message)
    {
        $this->message = $message;
    }

    public function broadcastOn()
    {
        // Canal do chat (um canal por número)
        return new Channel('chat.' . $this->message->chat_id);
    }

    public function broadcastWith()
    {
        return [
            'id'       => $this->message->id,
            'chat_id'  => $this->message->chat_id,
            'message'  => $this->message->message,
            'from_me'  => $this->message->from_me,
            'sent_at'  => $this->message->sent_at->format('Y-m-d H:i:s'),
        ];
    }
}
