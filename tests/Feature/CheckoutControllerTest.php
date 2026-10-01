<?php

namespace Tests\Feature;

use App\Models\Pagamentos\PagamentoPedido as Order;
use App\Models\Product;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class CheckoutControllerTest extends TestCase
{
    use LazilyRefreshDatabase;

    public function test_pix_checkout_creates_customer_payment_and_redirects_to_order(): void
    {
        $product = Product::factory()->create(['name' => 'Curso de fotografia', 'price' => '129.90']);
        config([
            'services.asaas.access_token' => 'sandbox-token',
            'services.asaas.environment' => 'sandbox',
        ]);

        Http::preventStrayRequests();
        Http::fake([
            'https://api-sandbox.asaas.com/v3/customers' => Http::response(['id' => 'cus_123'], 200),
            'https://api-sandbox.asaas.com/v3/payments' => Http::response([
                'id' => 'pay_123',
                'status' => 'PENDING',
                'invoiceUrl' => 'https://sandbox.asaas.com/i/pay_123',
            ], 200),
            'https://api-sandbox.asaas.com/v3/payments/pay_123/pixQrCode' => Http::response([
                'encodedImage' => 'base64-image',
                'payload' => 'pix-copy-and-paste',
                'expirationDate' => '2026-09-30 23:59:59',
            ], 200),
        ]);

        $response = $this->post(route('pagamentos.checkout.store'), [
            'product_id' => $product->id,
            'amount' => 0.01,
            'name' => 'Maria Silva',
            'cpf_cnpj' => '12345678901',
            'email' => 'maria@example.com',
            'phone' => '11999999999',
            'payment_method' => 'PIX',
        ]);

        $order = Order::query()->firstOrFail();

        $response->assertRedirect(route('pagamentos.pedidos.show', $order));
        $this->assertDatabaseHas('pagamentos_clientes', [
            'asaas_customer_id' => 'cus_123',
            'cpf_cnpj' => '12345678901',
        ]);
        $this->assertDatabaseHas('pagamentos_pedidos', [
            'id' => $order->id,
            'asaas_payment_id' => 'pay_123',
            'pix_payload' => 'pix-copy-and-paste',
            'status' => Order::STATUS_PENDING,
            'product_id' => $product->id,
            'amount' => '129.90',
            'description' => 'Curso de fotografia',
        ]);

        Http::assertSent(fn (Request $request) => $request->hasHeader('access_token', 'sandbox-token'));
        Http::assertSent(fn (Request $request) => str_ends_with($request->url(), '/payments')
            && $request['value'] === 129.90 && $request['description'] === 'Curso de fotografia');

        $product->update(['price' => '199.90', 'name' => 'Novo nome']);
        $this->assertSame('129.90', $order->fresh()->amount);
        $this->assertSame('Curso de fotografia', $order->fresh()->description);
    }

    public function test_checkout_rejects_invalid_payment_method(): void
    {
        Http::preventStrayRequests();

        $response = $this->post(route('pagamentos.checkout.store'), [
            'name' => 'Maria Silva',
            'cpf_cnpj' => '12345678901',
            'email' => 'maria@example.com',
            'payment_method' => 'DINHEIRO',
        ]);

        $response->assertSessionHasErrors('payment_method');
        $this->assertDatabaseEmpty('pagamentos_pedidos');
    }
}
