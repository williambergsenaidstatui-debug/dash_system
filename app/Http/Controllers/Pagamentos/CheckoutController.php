<?php

namespace App\Http\Controllers\Pagamentos;

use App\Http\Controllers\Controller;
use App\Models\Pagamentos\PagamentoCliente;
use App\Models\Pagamentos\PagamentoPedido;
use App\Services\Pagamentos\AsaasClient;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class CheckoutController extends Controller
{
    public function create(): View
    {
        return view('pagamentos.checkout');
    }

    public function store(Request $request, AsaasClient $asaas): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'cpf_cnpj' => ['required', 'string', 'max:20'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:30'],
            'payment_method' => ['required', Rule::in(['PIX', 'BOLETO', 'CREDIT_CARD'])],
        ]);

        $cliente = PagamentoCliente::firstOrCreate(
            ['cpf_cnpj' => $data['cpf_cnpj']],
            [
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'] ?? null,
            ],
        );

        if (blank($cliente->asaas_customer_id)) {
            $asaasCustomer = $asaas->createCustomer($cliente->only(['name', 'cpf_cnpj', 'email', 'phone']));
            $cliente->update(['asaas_customer_id' => $asaasCustomer['id']]);
        }

        $pedido = PagamentoPedido::create([
            'pagamento_cliente_id' => $cliente->id,
            'code' => Str::upper(Str::random(10)),
            'description' => 'Pedido demonstrativo',
            'amount' => 49.90,
            'payment_method' => $data['payment_method'],
        ]);

        $payment = $asaas->createPayment([
            'customer' => $cliente->asaas_customer_id,
            'billing_type' => $data['payment_method'],
            'value' => (float) $pedido->amount,
            'due_date' => now()->addDay()->toDateString(),
            'description' => $pedido->description,
            'external_reference' => $pedido->code,
        ]);

        $pedido->update([
            'asaas_payment_id' => $payment['id'],
            'asaas_status' => $payment['status'] ?? null,
            'invoice_url' => $payment['invoiceUrl'] ?? null,
            'bank_slip_url' => $payment['bankSlipUrl'] ?? null,
        ]);

        if ($data['payment_method'] === 'PIX') {
            $pixQrCode = $asaas->pixQrCode($payment['id']);

            $pedido->update([
                'pix_payload' => $pixQrCode['payload'] ?? null,
                'pix_encoded_image' => $pixQrCode['encodedImage'] ?? null,
                'pix_expiration_date' => $pixQrCode['expirationDate'] ?? null,
            ]);
        }

        return redirect()->route('pagamentos.pedidos.show', $pedido);
    }
}
