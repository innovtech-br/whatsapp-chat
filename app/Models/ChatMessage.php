<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'chat_id',
        'sender',
        'message',
        'from_me',
        'sent_at',
    ];

    protected $casts = [
        'from_me' => 'boolean',
        'sent_at' => 'datetime',
    ];
}

