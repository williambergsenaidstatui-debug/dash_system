<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pagamentos\AsaasWebhookController;
use App\Http\Controllers\Pagamentos\OrderController;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/pagamentos/pedidos/{pedido}/status', [OrderController::class, 'status'])
    ->name('api.pagamentos.pedidos.status');

Route::post('/pagamentos/asaas/webhook', AsaasWebhookController::class)
    ->name('api.pagamentos.asaas.webhook');
