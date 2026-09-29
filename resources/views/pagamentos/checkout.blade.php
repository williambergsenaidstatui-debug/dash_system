<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Checkout Asaas</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-zinc-50 text-zinc-950">
    <main class="mx-auto grid min-h-screen w-full max-w-6xl gap-8 px-6 py-8 lg:grid-cols-[1fr_420px] lg:items-center">
        <section class="space-y-8">
            <div class="space-y-4">
                <p class="text-sm font-semibold uppercase text-emerald-700">Checkout Asaas</p>
                <h1 class="max-w-3xl text-4xl font-bold leading-tight md:text-5xl">Pagamento integrado ao Asaas</h1>
                <p class="max-w-2xl text-lg text-zinc-600">Fluxo base para cadastrar cliente, gerar cobranca e atualizar o pedido quando o webhook confirmar o pagamento.</p>
            </div>

            <div class="grid gap-4 sm:grid-cols-3">
                <div class="rounded-lg border border-zinc-200 bg-white p-5">
                    <p class="text-sm text-zinc-500">Ambiente</p>
                    <p class="mt-2 text-xl font-semibold">{{ config('services.asaas.environment') }}</p>
                </div>
                <div class="rounded-lg border border-zinc-200 bg-white p-5">
                    <p class="text-sm text-zinc-500">Produto</p>
                    <p class="mt-2 text-xl font-semibold">Pedido demonstrativo</p>
                </div>
                <div class="rounded-lg border border-zinc-200 bg-white p-5">
                    <p class="text-sm text-zinc-500">Total</p>
                    <p class="mt-2 text-xl font-semibold">R$ 49,90</p>
                </div>
            </div>
        </section>

        <section class="rounded-lg border border-zinc-200 bg-white p-6 shadow-sm">
            <form method="POST" action="{{ route('pagamentos.checkout.store') }}" class="space-y-5">
                @csrf

                <div>
                    <label for="name" class="text-sm font-medium text-zinc-700">Nome completo</label>
                    <input id="name" name="name" value="{{ old('name') }}" class="mt-2 w-full rounded-md border border-zinc-300 px-3 py-2 outline-none focus:border-emerald-600" required>
                    @error('name') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="cpf_cnpj" class="text-sm font-medium text-zinc-700">CPF ou CNPJ</label>
                    <input id="cpf_cnpj" name="cpf_cnpj" value="{{ old('cpf_cnpj') }}" class="mt-2 w-full rounded-md border border-zinc-300 px-3 py-2 outline-none focus:border-emerald-600" required>
                    @error('cpf_cnpj') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="email" class="text-sm font-medium text-zinc-700">E-mail</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" class="mt-2 w-full rounded-md border border-zinc-300 px-3 py-2 outline-none focus:border-emerald-600" required>
                    @error('email') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="phone" class="text-sm font-medium text-zinc-700">Telefone</label>
                    <input id="phone" name="phone" value="{{ old('phone') }}" class="mt-2 w-full rounded-md border border-zinc-300 px-3 py-2 outline-none focus:border-emerald-600">
                    @error('phone') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <fieldset class="space-y-3">
                    <legend class="text-sm font-medium text-zinc-700">Forma de pagamento</legend>
                    <div class="grid grid-cols-3 gap-2">
                        @foreach (['PIX' => 'Pix', 'BOLETO' => 'Boleto', 'CREDIT_CARD' => 'Cartao'] as $value => $label)
                            <label class="flex cursor-pointer items-center justify-center rounded-md border border-zinc-300 px-3 py-2 text-sm has-[:checked]:border-emerald-600 has-[:checked]:bg-emerald-50">
                                <input type="radio" name="payment_method" value="{{ $value }}" class="sr-only" @checked(old('payment_method', 'PIX') === $value)>
                                {{ $label }}
                            </label>
                        @endforeach
                    </div>
                    @error('payment_method') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
                </fieldset>

                <button class="w-full rounded-md bg-emerald-700 px-4 py-3 font-semibold text-white transition hover:bg-emerald-800">Gerar cobranca</button>
            </form>
        </section>
    </main>
</body>
</html>
