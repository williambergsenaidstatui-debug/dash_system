<header id="nav" class="site-header" aria-label="Menu principal">
    <div class="container header-inner">
        <a href="{{ route('inicio') }}" class="brand" aria-label="Dash Brasil">
            <img src="{{ asset('fotofinal.png') }}" alt="Logo Dash Brasil" class="brand-logo">
            <span class="brand-title"></span>
        </a>

        <button class="mobile-nav-toggle" type="button" aria-expanded="false" aria-controls="mainNavigation" aria-label="Abrir menu">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <nav class="nav" id="mainNavigation" aria-label="Navega&ccedil;&atilde;o principal">
            <div class="mobile-nav-header">
                <img src="{{ asset('fotofinal.png') }}" alt="" aria-hidden="true">
                <button class="mobile-nav-close" type="button" aria-label="Fechar menu">&times;</button>
            </div>
            <ul>
                <li><a href="{{ route('inicio') }}">In&iacute;cio</a></li>
                <li><a href="{{ route('sobre') }}">Sobre N&oacute;s</a></li>
                <li><a href="{{ route('servicos') }}">Servi&ccedil;os</a></li>
                <li><a href="{{ route('projetos') }}">Projetos</a></li>
                <li><a href="{{ route('contato') }}">Contato</a></li>
            </ul>
        </nav>
    </div>
    <button class="mobile-nav-backdrop" type="button" tabindex="-1" aria-label="Fechar menu"></button>
</header>
