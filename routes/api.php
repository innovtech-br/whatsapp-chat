<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebhookController;

Route::post('/webhook/wuzapi', [WebhookController::class, 'receive']);

// Exemplo de uma rota de teste de API padrão (opcional)
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});