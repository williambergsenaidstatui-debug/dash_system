<?php

namespace App\Http\Controllers\Pagamentos;

use App\Http\Controllers\Controller;
use App\Models\Pagamentos\PagamentoPedido;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function show(PagamentoPedido $pedido): View
    {
        return view('pagamentos.pedidos.show', [
            'pedido' => $pedido->load('cliente'),
        ]);
    }

    public function status(PagamentoPedido $pedido): JsonResponse
    {
        return response()->json([
            'status' => $pedido->status,
            'asaas_status' => $pedido->asaas_status,
            'paid_at' => $pedido->paid_at?->toISOString(),
        ]);
    }
}
