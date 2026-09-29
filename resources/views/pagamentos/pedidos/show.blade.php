<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pedido {{ $pedido->code }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-zinc-50 text-zinc-950">
    <main class="mx-auto grid min-h-screen w-full max-w-6xl gap-8 px-6 py-8 lg:grid-cols-[420px_1fr] lg:items-center">
        <section class="rounded-lg border border-zinc-200 bg-white p-6 shadow-sm">
            <p class="text-sm text-zinc-500">Pedido {{ $pedido->code }}</p>
            <h1 class="mt-2 text-3xl font-bold" data-order-status-title>
                {{ $pedido->status === 'paid' ? 'Pagamento confirmado' : 'Aguardando pagamento' }}
            </h1>
            <dl class="mt-6 space-y-3 text-sm">
                <div class="flex justify-between gap-4">
                    <dt class="text-zinc-500">Cliente</dt>
                    <dd class="font-medium">{{ $pedido->cliente->name }}</dd>
                </div>
                <div class="flex justify-between gap-4">
                    <dt class="text-zinc-500">Total</dt>
                    <dd class="font-medium">R$ {{ number_format((float) $pedido->amount, 2, ',', '.') }}</dd>
                </div>
                <div class="flex justify-between gap-4">
                    <dt class="text-zinc-500">Status</dt>
                    <dd class="font-medium" data-order-status>{{ $pedido->status }}</dd>
                </div>
            </dl>
        </section>

        <section class="space-y-5">
            @if ($pedido->payment_method === 'PIX' && $pedido->pix_payload)
                <div class="rounded-lg border border-zinc-200 bg-white p-6 shadow-sm">
                    <h2 class="text-xl font-semibold">Pix Copia e Cola</h2>
                    @if ($pedido->pix_encoded_image)
                        <img class="mt-5 h-56 w-56 rounded-md border border-zinc-200 p-2" src="data:image/png;base64,{{ $pedido->pix_encoded_image }}" alt="QR Code Pix">
                    @endif
                    <textarea readonly data-pix-payload class="mt-5 h-28 w-full rounded-md border border-zinc-300 p-3 text-sm">{{ $pedido->pix_payload }}</textarea>
                    <button type="button" data-copy-pix class="mt-3 rounded-md bg-zinc-950 px-4 py-2 text-sm font-semibold text-white">Copiar codigo Pix</button>
                </div>
            @elseif ($pedido->bank_slip_url)
                <a class="inline-flex rounded-md bg-zinc-950 px-4 py-3 font-semibold text-white" href="{{ $pedido->bank_slip_url }}" target="_blank" rel="noreferrer">Abrir boleto</a>
            @elseif ($pedido->invoice_url)
                <a class="inline-flex rounded-md bg-zinc-950 px-4 py-3 font-semibold text-white" href="{{ $pedido->invoice_url }}" target="_blank" rel="noreferrer">Abrir cobranca</a>
            @endif
        </section>
    </main>

    <script>
        window.statusUrl = @json(route('api.pagamentos.pedidos.status', $pedido));
    </script>
</body>
</html>
