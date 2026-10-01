<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    use LazilyRefreshDatabase;

    public function test_dashboard_requires_login_and_owner_permission(): void
    {
        $this->get(route('pagamentos.dashboard.index'))->assertRedirect(route('login'));
        $this->post(route('pagamentos.dashboard.products.store'), ['name' => 'Indevido'])->assertRedirect(route('login'));
        $this->actingAs(User::factory()->create())->get(route('pagamentos.dashboard.index'))->assertForbidden();
        $this->post(route('pagamentos.dashboard.products.store'), ['name' => 'Indevido'])->assertForbidden();
        $this->assertDatabaseEmpty('products');
    }

    public function test_owner_can_register_a_product_with_brazilian_price(): void
    {
        $owner = User::factory()->create(['cargo' => 'adm']);

        $response = $this->actingAs($owner)->post(route('pagamentos.dashboard.products.store'), [
            'name' => 'Curso de fotografia',
            'description' => 'Aprenda a fotografar.',
            'price' => '129,90',
            'is_active' => '1',
            'id' => 999,
        ]);

        $response->assertRedirect(route('pagamentos.dashboard.index'));
        $this->assertDatabaseHas('products', [
            'name' => 'Curso de fotografia', 'description' => 'Aprenda a fotografar.', 'price' => '129.90', 'is_active' => true,
        ]);
        $this->assertDatabaseMissing('products', ['id' => 999]);
        $this->get(route('pagamentos.dashboard.index'))->assertSee('Curso de fotografia')->assertSee('129,90');
    }

    public function test_owner_can_update_the_price_and_deactivate_a_product(): void
    {
        $product = Product::factory()->create();
        $owner = User::factory()->create(['cargo' => 'adm']);

        $response = $this->actingAs($owner)->put(route('pagamentos.dashboard.products.update', $product), [
            'name' => 'Produto atualizado', 'description' => 'Nova descrição', 'price' => '159.50', 'is_active' => 0,
        ]);

        $response->assertRedirect(route('pagamentos.dashboard.index'));
        $this->assertDatabaseHas('products', ['id' => $product->id, 'name' => 'Produto atualizado', 'price' => '159.50', 'is_active' => false]);
        $this->get(route('pagamentos.checkout.create', $product))->assertNotFound();
    }

    public function test_non_owner_cannot_edit_or_update_products(): void
    {
        $product = Product::factory()->create(['name' => 'Original']);
        $user = User::factory()->create();

        $this->actingAs($user)->get(route('pagamentos.dashboard.products.edit', $product))->assertForbidden();
        $this->put(route('pagamentos.dashboard.products.update', $product), ['name' => 'Alterado'])->assertForbidden();
        $this->assertDatabaseHas('products', ['id' => $product->id, 'name' => 'Original']);
    }

    public function test_product_forms_render_for_the_owner(): void
    {
        $product = Product::factory()->create(['price' => '75.50']);
        $owner = User::factory()->create(['cargo' => 'adm']);

        $this->actingAs($owner)->get(route('pagamentos.dashboard.products.create'))->assertSee('Cadastrar produto');
        $this->get(route('pagamentos.dashboard.products.edit', $product))->assertSee('75.50');
    }

    public function test_product_requires_a_name_and_a_valid_price(): void
    {
        $owner = User::factory()->create(['cargo' => 'adm']);

        $this->actingAs($owner)->post(route('pagamentos.dashboard.products.store'), [
            'name' => '', 'price' => '0', 'is_active' => 1,
        ])->assertSessionHasErrors(['name' => 'Informe o nome do produto.', 'price' => 'O preço mínimo é R$ 5,00.']);
        $this->post(route('pagamentos.dashboard.products.store'), [
            'name' => 'Produto', 'price' => '12.345', 'is_active' => 1,
        ])->assertSessionHasErrors(['price' => 'Use no máximo duas casas decimais no preço.']);
        $this->assertDatabaseEmpty('products');
    }

    public function test_catalog_only_lists_active_products_and_escapes_content(): void
    {
        $product = Product::factory()->create(['name' => '<script>alert(1)</script>', 'description' => '<b>Descrição</b>', 'price' => '75.50']);
        Product::factory()->create(['name' => 'Produto oculto', 'is_active' => false]);

        $this->get(route('pagamentos.products.index'))->assertSee($product->name)->assertSee($product->description)
            ->assertDontSee($product->name, false)->assertDontSee('Produto oculto')->assertSee('75,50');
        $this->get(route('pagamentos.checkout.create', $product))->assertSee('75,50')->assertSee($product->name)->assertDontSee($product->name, false);
    }

    public function test_checkout_rejects_inactive_missing_or_unknown_products_without_calling_asaas(): void
    {
        $product = Product::factory()->create(['is_active' => false]);
        Http::preventStrayRequests();
        Http::fake();

        foreach ([$product->id, 999, null] as $productId) {
            $this->post(route('pagamentos.checkout.store'), [
                'product_id' => $productId, 'name' => 'Maria', 'cpf_cnpj' => '12345678901',
                'email' => 'maria@example.com', 'payment_method' => 'PIX',
            ])->assertSessionHasErrors('product_id');
        }

        $this->assertDatabaseEmpty('pagamentos_pedidos');
        $this->assertDatabaseEmpty('pagamentos_clientes');
        Http::assertNothingSent();
    }
}
