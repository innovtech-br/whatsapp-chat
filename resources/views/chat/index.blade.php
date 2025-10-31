@extends('layouts.default')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        Chat com 559181482346
    </div>
    <div class="card-body chat-container bg-light">
        @foreach ($messages as $msg)
            <div class="mb-2 {{ $msg->from_me ? 'text-end' : 'text-start' }}">
                <span class="message-bubble {{ $msg->from_me ? 'from-me' : 'from-them' }}">
                    {{ $msg->message }}
                </span>
            </div>
        @endforeach
    </div>
</div>
@endsection
