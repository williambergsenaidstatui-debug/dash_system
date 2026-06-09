<header id="nav" class="site-header" aria-label="Menu principal">
    <div class="container header-inner">
        <a href="{{ route('portfolio') }}" class="brand" aria-label="Dash System">
            <img src="{{ asset('fotofinal.png') }}" alt="Logo Dash System" class="brand-logo">
            <span class="brand-title"></span>
        </a>

        <nav class="nav" aria-label="Navegação principal">
            <ul>
                <li><a href="{{ route('portfolio') }}">Início</a></li>
                <li><a href="{{ route('portfolio') }}#home">Sobre Nós</a></li>
                <li><a href="{{ route('portfolio') }}#servicos">Serviços</a></li>
                <li><a href="{{ route('portfolio') }}#contato">Contato</a></li>
            </ul>
        </nav>
    </div>
</header>
