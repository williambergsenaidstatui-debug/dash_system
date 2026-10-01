@extends('pagamentos.layout')
@section('title', $product->exists ? 'Editar produto' : 'Cadastrar produto')
@section('content')
    <div class="mx-auto max-w-2xl">
        <a href="{{ route('pagamentos.dashboard.index') }}" class="text-sm text-zinc-600 hover:text-emerald-700">← Voltar ao painel</a>
        <h1 class="mb-6 mt-4 text-3xl font-bold">{{ $product->exists ? 'Editar produto' : 'Cadastrar produto' }}</h1>
        <form method="POST" action="{{ $product->exists ? route('pagamentos.dashboard.products.update', $product) : route('pagamentos.dashboard.products.store') }}" class="flex flex-col gap-6 rounded-2xl border border-zinc-200 bg-white p-6 shadow-sm">
            @csrf
            @if ($product->exists) @method('PUT') @endif
            <div>
                <label for="name" class="text-sm font-medium">Nome do produto</label>
                <input id="name" name="name" value="{{ old('name', $product->name) }}" required maxlength="255" class="mt-2 w-full rounded-lg border border-zinc-300 px-3 py-3 focus:border-emerald-600 focus:outline-emerald-600">
                @error('name') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>
            <div>
                <label for="description" class="text-sm font-medium">Descrição <span class="text-zinc-500">(opcional)</span></label>
                <textarea id="description" name="description" rows="4" maxlength="5000" class="mt-2 w-full rounded-lg border border-zinc-300 px-3 py-3 focus:outline-emerald-600">{{ old('description', $product->description) }}</textarea>
                @error('description') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>
            <div>
                <label for="price" class="text-sm font-medium">Preço em reais (R$)</label>
                <input id="price" name="price" type="text" inputmode="decimal" value="{{ old('price', $product->price) }}" placeholder="49,90" required aria-describedby="price-help" class="mt-2 w-full rounded-lg border border-zinc-300 px-3 py-3 focus:outline-emerald-600">
                <p id="price-help" class="mt-2 text-sm text-zinc-500">Use 49,90 ou 49.90, sem separador de milhar. Mínimo de R$ 5,00.</p>
                @error('price') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>
            <div>
                <input type="hidden" name="is_active" value="0">
                <label class="flex items-center gap-3"><input type="checkbox" name="is_active" value="1" @checked(old('is_active', $product->is_active)) class="h-4 w-4 accent-emerald-700"><span class="text-sm font-medium">Disponível para venda</span></label>
                <p class="mt-2 text-sm text-zinc-500">Produtos inativos ficam ocultos da loja e não aceitam novas compras.</p>
                @error('is_active') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>
            <button class="rounded-lg bg-emerald-700 px-5 py-3 font-semibold text-white hover:bg-emerald-800">Salvar produto</button>
        </form>
    </div>
@endsection
