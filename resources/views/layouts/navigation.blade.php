<nav x-data="{ mobileOpen: false, accountOpen: false }" class="admin-nav" aria-label="Navegacao administrativa">
    <div class="admin-nav__inner">
        <a href="{{ route('dashboard') }}" class="admin-nav__brand" aria-label="Dashboard Dash Brasil">
            <img src="{{ asset('fotofinal.png') }}" alt="Dash Brasil">
        </a>

        <div class="admin-nav__links" aria-label="Atalhos">
            @can('manage-products')
                <a href="{{ route('pagamentos.dashboard.index') }}" class="admin-nav__link">Produtos</a>
            @endcan
            @can('access-dashboard')
                <a href="{{ route('dashboard') }}" @class(['admin-nav__link', 'is-active' => request()->routeIs('dashboard')])>Painel</a>
                <a href="{{ route('admin.projects.create') }}" @class(['admin-nav__link', 'is-active' => request()->routeIs('admin.projects.create')])>Novo projeto</a>
            @endcan
            <a href="{{ route('projetos') }}" target="_blank" rel="noopener" class="admin-nav__link">Ver site</a>
        </div>

        <div class="admin-account" @click.outside="accountOpen = false">
            <button type="button" class="admin-account__trigger" @click="accountOpen = !accountOpen" :aria-expanded="accountOpen.toString()" aria-controls="adminAccountMenu">
                <span class="admin-account__avatar" aria-hidden="true">{{ mb_strtoupper(mb_substr(Auth::user()->name, 0, 2)) }}</span>
                <span class="admin-account__name">{{ Auth::user()->name }}</span>
                <span aria-hidden="true">&#8964;</span>
            </button>

            <div id="adminAccountMenu" x-cloak x-show="accountOpen" x-transition class="admin-account__menu">
                <a href="{{ route('profile.edit') }}">Meu perfil</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="is-danger">Sair</button>
                </form>
            </div>
        </div>

        <button type="button" class="admin-nav__toggle" @click="mobileOpen = !mobileOpen" :aria-expanded="mobileOpen.toString()" aria-controls="adminMobileMenu" aria-label="Abrir menu">
            <span aria-hidden="true">&#9776;</span>
        </button>
    </div>

    <div id="adminMobileMenu" x-cloak x-show="mobileOpen" x-transition class="admin-nav__mobile">
        @can('manage-products')
            <a href="{{ route('pagamentos.dashboard.index') }}">Produtos</a>
        @endcan
        @can('access-dashboard')
            <a href="{{ route('dashboard') }}">Painel</a>
            <a href="{{ route('admin.projects.create') }}">Novo projeto</a>
        @endcan
        <a href="{{ route('projetos') }}" target="_blank" rel="noopener">Ver site</a>
        <a href="{{ route('profile.edit') }}">Meu perfil</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Sair</button>
        </form>
    </div>
</nav>
