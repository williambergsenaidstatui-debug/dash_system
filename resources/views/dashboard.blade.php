<x-app-layout>
    <x-slot name="header">
        <div class="admin-heading-row">
            <div>
                <p>Projetos do portf&oacute;lio</p>
                <h1>Dashboard administrativo<span class="admin-heading-dot">.</span></h1>
            </div>
            <a href="{{ route('admin.projects.create') }}" class="admin-primary-action inline-flex items-center justify-center px-4 py-2 text-sm font-semibold text-white">Novo projeto</a>
        </div>
    </x-slot>

    <div class="admin-dashboard py-8">
        <div class="mx-auto max-w-7xl space-y-8 px-4 sm:px-6 lg:px-8">
            @if (session('status'))
                <div class="admin-flash" role="status">
                    <span aria-hidden="true">&#10003;</span>
                    {{ session('status') }}
                </div>
            @endif

            <section aria-labelledby="summary-title">
                <h2 id="summary-title" class="sr-only">Resumo dos projetos</h2>
                <dl class="dashboard-summary grid grid-cols-2 gap-px overflow-hidden rounded-md border md:grid-cols-3">
                    <div>
                        <dt>Projetos cadastrados</dt>
                        <dd>{{ $projects->count() }}</dd>
                        <span>Total no painel</span>
                    </div>
                    <div>
                        <dt>Publicados</dt>
                        <dd>{{ $projects->where('status', 'published')->count() }}</dd>
                        <span>Vis&iacute;veis no site</span>
                    </div>
                    <div class="col-span-2 md:col-span-1">
                        <dt>Rascunhos</dt>
                        <dd>{{ $projects->where('status', 'draft')->count() }}</dd>
                        <span>Aguardando publica&ccedil;&atilde;o</span>
                    </div>
                </dl>
            </section>

            <section
                class="admin-project-list"
                aria-labelledby="projects-title"
                x-data="{ query: '', status: 'all' }"
            >
                <div class="admin-project-list__heading">
                    <div>
                        <h2 id="projects-title">Projetos</h2>
                        <p>{{ $projects->count() }} {{ $projects->count() === 1 ? 'item cadastrado' : 'itens cadastrados' }}</p>
                    </div>
                    <a href="{{ route('projetos') }}" target="_blank" rel="noopener">Abrir portf&oacute;lio <span aria-hidden="true">&#8599;</span></a>
                </div>

                @if ($projects->isEmpty())
                    <div class="admin-empty-state bg-white px-6 py-14 text-center">
                        <h3 class="font-semibold text-gray-900">Nenhum projeto cadastrado</h3>
                        <p class="mt-2 text-sm text-gray-500">Seu primeiro projeto aparecer&aacute; aqui.</p>
                        <a href="{{ route('admin.projects.create') }}" class="admin-primary-action mt-5 inline-flex px-4 py-2 text-sm font-semibold text-white">Criar projeto</a>
                    </div>
                @else
                    <div class="admin-project-toolbar">
                        <label class="admin-search">
                            <span class="sr-only">Buscar projeto</span>
                            <input type="search" x-model.debounce.200ms="query" placeholder="Buscar projeto">
                        </label>

                        <div class="admin-status-filter" aria-label="Filtrar por status">
                            <button type="button" @click="status = 'all'" :class="{ 'is-active': status === 'all' }">Todos</button>
                            <button type="button" @click="status = 'published'" :class="{ 'is-active': status === 'published' }">Publicados</button>
                            <button type="button" @click="status = 'draft'" :class="{ 'is-active': status === 'draft' }">Rascunhos</button>
                        </div>
                    </div>

                    <div class="admin-table-shell overflow-x-auto bg-white">
                        <table class="min-w-full">
                            <thead>
                                <tr>
                                    <th>Projeto</th>
                                    <th>Status</th>
                                    <th>M&iacute;dia</th>
                                    <th>Atualizado</th>
                                    <th><span class="sr-only">A&ccedil;&otilde;es</span></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($projects as $project)
                                    <tr
                                        data-search="{{ mb_strtolower($project->name.' '.$project->category) }}"
                                        x-show="(status === 'all' || status === '{{ $project->status }}') && $el.dataset.search.includes(query.toLowerCase())"
                                    >
                                        <td data-label="Projeto">
                                            <div class="admin-project-cell">
                                                @if (filled($project->images))
                                                    <img src="{{ $project->images[0] }}" alt="" loading="lazy">
                                                @else
                                                    <div class="admin-project-cell__placeholder">D</div>
                                                @endif
                                                <div>
                                                    <strong>{{ $project->name }}</strong>
                                                    <span>{{ $project->category }} &middot; Ordem {{ $project->sort_order }}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td data-label="Status">
                                            <span @class(['admin-status', 'is-published' => $project->status === 'published', 'is-draft' => $project->status === 'draft'])>
                                                {{ $project->status === 'published' ? 'Publicado' : 'Rascunho' }}
                                            </span>
                                        </td>
                                        <td data-label="M&iacute;dia">
                                            <span class="admin-media-count">
                                                {{ count($project->images ?? []) }} {{ count($project->images ?? []) === 1 ? 'imagem' : 'imagens' }}
                                                @if ($project->video_path) &middot; v&iacute;deo @endif
                                            </span>
                                        </td>
                                        <td data-label="Atualizado">
                                            <time datetime="{{ $project->updated_at->toIso8601String() }}">{{ $project->updated_at->format('d/m/Y') }}</time>
                                        </td>
                                        <td data-label="A&ccedil;&otilde;es">
                                            <div class="admin-row-actions">
                                                <a href="{{ route('admin.projects.edit', $project) }}">Editar</a>
                                                <form method="POST" action="{{ route('admin.projects.destroy', $project) }}" onsubmit="return confirm('Excluir este projeto permanentemente?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit">Excluir</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </section>
        </div>
    </div>
</x-app-layout>
