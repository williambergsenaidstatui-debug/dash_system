@extends('pagamentos.layout')
@section('title', 'Produtos | Minha loja')
@section('content')
    <div class="mb-8 flex flex-col gap-3">
        <p class="text-sm font-semibold uppercase tracking-widest text-emerald-700">Escolha seu próximo produto</p>
        <h1 class="text-4xl font-bold tracking-tight">Nossa vitrine</h1>
        <p class="text-zinc-600">Escolha um produto e pague com Pix, boleto ou cartão.</p>
    </div>
    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
        @forelse ($products as $product)
            <article class="flex flex-col gap-5 rounded-2xl border border-zinc-200 bg-white p-6 shadow-sm">
                <div class="flex h-14 w-14 items-center justify-center rounded-xl bg-emerald-50 text-2xl font-bold text-emerald-700" aria-hidden="true">{{ mb_substr($product->name, 0, 1) }}</div>
                <div class="flex flex-1 flex-col gap-2">
                    <h2 class="text-xl font-semibold">{{ $product->name }}</h2>
                    <p class="whitespace-pre-line break-words text-sm leading-relaxed text-zinc-600">{{ $product->description }}</p>
                </div>
                <p class="text-3xl font-bold">R$ {{ number_format((float) $product->price, 2, ',', '.') }}</p>
                <a href="{{ route('pagamentos.checkout.create', $product) }}" class="rounded-lg bg-emerald-700 px-4 py-3 text-center font-semibold text-white hover:bg-emerald-800">Comprar agora</a>
            </article>
        @empty
            <div class="rounded-2xl border border-dashed border-zinc-300 p-10 text-center sm:col-span-2 lg:col-span-3">
                <h2 class="text-xl font-semibold">Em breve, novos produtos</h2>
                <p class="mt-2 text-zinc-600">Ainda não há produtos disponíveis para compra.</p>
            </div>
        @endforelse
    </div>
    <div class="mt-8">{{ $products->links() }}</div>
@endsection
