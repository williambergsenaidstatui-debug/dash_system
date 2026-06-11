<header id="nav" class="site-header" aria-label="Menu principal">
    <div class="container header-inner">
        <a href="{{ route('inicio') }}" class="brand" aria-label="Dash System">
            <img src="{{ asset('fotofinal.png') }}" alt="Logo Dash System" class="brand-logo">
            <span class="brand-title"></span>
        </a>

        <nav class="nav" aria-label="Navega&ccedil;&atilde;o principal">
            <ul>
                <li><a href="{{ route('inicio') }}">In&iacute;cio</a></li>
                <li><a href="{{ route('sobre') }}">Sobre N&oacute;s</a></li>
                <li><a href="{{ route('servicos') }}">Servi&ccedil;os</a></li>
                <li><a href="{{ route('projetos') }}">Projetos</a></li>
                <li><a href="{{ route('contato') }}">Contato</a></li>
            </ul>
        </nav>
    </div>
</header>
