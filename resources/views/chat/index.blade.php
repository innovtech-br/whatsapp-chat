@extends('layouts.default')

@section('content')
<div class="container py-4">
    <h4 class="mb-4">Chat com 559181482346</h4>

    <div class="border rounded p-3 bg-light" style="height: 70vh; overflow-y: auto;">
        @foreach ($messages as $msg)
            @if($msg->from_me)
                <div class="text-end mb-2">
                    <span class="badge bg-primary text-white">{{ $msg->message }}</span>
                </div>
            @else
                <div class="text-start mb-2">
                    <span class="badge bg-secondary">{{ $msg->message }}</span>
                </div>
            @endif
        @endforeach
    </div>
</div>
@endsection
