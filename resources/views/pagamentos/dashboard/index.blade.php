@extends('pagamentos.layout')
@section('title', 'Painel do proprietário')
@section('content')
    <div class="mb-8 flex flex-col justify-between gap-4 sm:flex-row sm:items-center">
        <div class="flex flex-col gap-2">
            <p class="text-sm font-semibold text-emerald-700">Área do proprietário</p>
            <h1 class="text-3xl font-bold tracking-tight">Seus produtos</h1>
            <p class="text-zinc-600">Cadastre produtos, defina preços e compartilhe o link de pagamento.</p>
        </div>
        <a href="{{ route('pagamentos.dashboard.products.create') }}" class="rounded-lg bg-emerald-700 px-5 py-3 text-center font-semibold text-white hover:bg-emerald-800">+ Cadastrar produto</a>
    </div>
    <div class="mb-8 grid gap-4 sm:grid-cols-2">
        <div class="rounded-xl border border-zinc-200 bg-white p-5"><p class="text-sm text-zinc-500">Produtos cadastrados</p><p class="mt-2 text-3xl font-bold">{{ $totalProducts }}</p></div>
        <div class="rounded-xl border border-zinc-200 bg-white p-5"><p class="text-sm text-zinc-500">Disponíveis para venda</p><p class="mt-2 text-3xl font-bold text-emerald-700">{{ $activeProducts }}</p></div>
    </div>
    <div class="overflow-x-auto rounded-xl border border-zinc-200 bg-white">
        <table class="w-full text-left text-sm">
            <thead class="border-b border-zinc-200 bg-zinc-100 text-zinc-600"><tr><th class="px-6 py-4">Produto</th><th class="px-6 py-4">Preço</th><th class="px-6 py-4">Status</th><th class="px-6 py-4">Ações</th></tr></thead>
            <tbody class="divide-y divide-zinc-100">
                @forelse ($products as $product)
                    <tr>
                        <td class="px-6 py-5 font-semibold">{{ $product->name }}</td>
                        <td class="whitespace-nowrap px-6 py-5">R$ {{ number_format((float) $product->price, 2, ',', '.') }}</td>
                        <td class="px-6 py-5"><span class="rounded-full px-3 py-1 text-xs font-medium {{ $product->is_active ? 'bg-emerald-50 text-emerald-800' : 'bg-zinc-100 text-zinc-600' }}">{{ $product->is_active ? 'Ativo' : 'Inativo' }}</span></td>
                        <td class="px-6 py-5">
                            <div class="flex flex-wrap items-center gap-4">
                                <a href="{{ route('pagamentos.dashboard.products.edit', $product) }}" class="font-semibold text-emerald-700 hover:underline">Editar</a>
                                @if ($product->is_active)
                                    <a href="{{ route('pagamentos.checkout.create', $product) }}" class="text-zinc-600 hover:underline" target="_blank" rel="noopener">Abrir checkout</a>
                                    <button type="button" data-copy-link="{{ route('pagamentos.checkout.create', $product) }}" class="text-zinc-600 hover:underline">Copiar link</button>
                                @endif
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="px-6 py-12 text-center text-zinc-500">Seu catálogo começa aqui. Cadastre o primeiro produto para receber pagamentos.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-6">{{ $products->links() }}</div>
@endsection
