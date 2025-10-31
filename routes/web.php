<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\ChatController;

Route::get('/chat', [ChatController::class, 'index'])->name('chat.index');

