<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Minha loja')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-zinc-50 text-zinc-950">
    <header class="border-b border-zinc-200 bg-white">
        <nav class="mx-auto flex max-w-6xl flex-wrap items-center justify-between gap-4 px-6 py-5" aria-label="Menu principal">
            <a href="{{ route('pagamentos.products.index') }}" class="text-xl font-bold tracking-tight">Minha<span class="text-emerald-700">loja</span></a>
            <div class="flex items-center gap-5 text-sm font-medium">
                <a href="{{ route('inicio') }}" class="hover:text-emerald-700">Ver site</a>
                <a href="{{ route('pagamentos.products.index') }}" class="hover:text-emerald-700">Ver loja</a>
                @can('manage-products')
                    <a href="{{ route('pagamentos.dashboard.index') }}" class="hover:text-emerald-700">Painel</a>
                @endcan
                @auth
                    <form method="POST" action="{{ route('logout') }}">@csrf<button class="text-zinc-500 hover:text-zinc-950">Sair</button></form>
                @else
                    <a href="{{ route('login') }}" class="rounded-lg bg-zinc-950 px-4 py-2 text-white hover:bg-zinc-800">Área do proprietário</a>
                @endauth
            </div>
        </nav>
    </header>
    <main class="mx-auto max-w-6xl px-6 py-10">
        @if (session('status'))
            <div role="status" class="mb-6 rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-sm text-emerald-800">{{ session('status') }}</div>
        @endif
        @yield('content')
    </main>
</body>
</html>
