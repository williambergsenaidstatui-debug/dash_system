<?php

namespace App\Http\Controllers\Pagamentos;
use App\Http\Controllers\Controller;

use App\Models\Pagamentos\PagamentoCliente as Customer;
use App\Models\Pagamentos\PagamentoPedido as Order;
use App\Models\Product;
use App\Services\Pagamentos\AsaasClient;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class CheckoutController extends Controller
{
    public function create(Product $product): View
    {
        abort_unless($product->is_active, 404);

        return view('pagamentos.checkout', ['product' => $product]);
    }

    public function store(Request $request, AsaasClient $asaas): RedirectResponse
    {
        $data = $request->validate([
            'product_id' => ['required', 'integer', Rule::exists('products', 'id')->where('is_active', true)],
            'name' => ['required', 'string', 'max:255'],
            'cpf_cnpj' => ['required', 'string', 'max:20'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:30'],
            'payment_method' => ['required', Rule::in(['PIX', 'BOLETO', 'CREDIT_CARD'])],
        ]);

        $product = Product::query()->where('is_active', true)->findOrFail($data['product_id']);

        $customer = Customer::firstOrCreate(
            ['cpf_cnpj' => $data['cpf_cnpj']],
            [
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'] ?? null,
            ],
        );

        if (blank($customer->asaas_customer_id)) {
            $asaasCustomer = $asaas->createCustomer($customer->only(['name', 'cpf_cnpj', 'email', 'phone']));
            $customer->update(['asaas_customer_id' => $asaasCustomer['id']]);
        }

        $order = Order::create([
            'pagamento_cliente_id' => $customer->id,
            'product_id' => $product->id,
            'code' => Str::upper(Str::random(10)),
            'description' => $product->name,
            'amount' => $product->price,
            'payment_method' => $data['payment_method'],
        ]);

        $payment = $asaas->createPayment([
            'customer' => $customer->asaas_customer_id,
            'billing_type' => $data['payment_method'],
            'value' => (float) $order->amount,
            'due_date' => now()->addDay()->toDateString(),
            'description' => $order->description,
            'external_reference' => $order->code,
        ]);

        $order->update([
            'asaas_payment_id' => $payment['id'],
            'asaas_status' => $payment['status'] ?? null,
            'invoice_url' => $payment['invoiceUrl'] ?? null,
            'bank_slip_url' => $payment['bankSlipUrl'] ?? null,
        ]);

        if ($data['payment_method'] === 'PIX') {
            $pixQrCode = $asaas->pixQrCode($payment['id']);

            $order->update([
                'pix_payload' => $pixQrCode['payload'] ?? null,
                'pix_encoded_image' => $pixQrCode['encodedImage'] ?? null,
                'pix_expiration_date' => $pixQrCode['expirationDate'] ?? null,
            ]);
        }

        return redirect()->route('pagamentos.pedidos.show', $order);
    }
}
