@php
    $servicos = [
        [
            'titulo' => 'Front-End',
            'texto' => 'Interfaces modernas, rápidas e responsivas com React, Vue e Tailwind CSS.',
            'icone' => 'fab fa-html5',
            'corIcone' => 'text-orange-600',
            'glow' => 'bg-blue-500',
            'fundoIcone' => 'bg-blue-50',
            'linha' => 'bg-blue-600',
            'link' => 'text-blue-600',
        ],
        [
            'titulo' => 'Back-End',
            'texto' => 'Sistemas robustos utilizando PHP, Laravel e Node.js com alta performance.',
            'icone' => 'fas fa-database',
            'corIcone' => 'text-purple-700',
            'glow' => 'bg-purple-500',
            'fundoIcone' => 'bg-purple-50',
            'linha' => 'bg-purple-600',
            'link' => 'text-purple-600',
        ],
        [
            'titulo' => 'APIs',
            'texto' => 'Integrações inteligentes para automatizar processos e conectar sistemas.',
            'icone' => 'fas fa-plug',
            'corIcone' => 'text-green-600',
            'glow' => 'bg-green-500',
            'fundoIcone' => 'bg-green-50',
            'linha' => 'bg-green-600',
            'link' => 'text-green-600',
        ],
        [
            'titulo' => 'Segurança',
            'texto' => 'Boas práticas para aplicações mais seguras e proteção de dados.',
            'icone' => 'fas fa-shield-alt',
            'corIcone' => 'text-red-600',
            'glow' => 'bg-red-500',
            'fundoIcone' => 'bg-red-50',
            'linha' => 'bg-red-600',
            'link' => 'text-red-600',
        ],
    ];
@endphp

<section class="px-4 py-12">
    <div class="mx-auto max-w-6xl">
        <div class="grid grid-cols-1 justify-items-center gap-8 sm:grid-cols-2 lg:grid-cols-4">
            @foreach ($servicos as $servico)
                <article class="card-hover group relative flex h-full w-full max-w-[280px] flex-col items-center rounded-2xl bg-white p-6 text-center shadow-lg transition-all duration-300 hover:shadow-2xl">
                    <div class="relative mb-4">
                        <div class="absolute inset-0 rounded-2xl {{ $servico['glow'] }} opacity-30 blur-xl transition-opacity duration-300 group-hover:opacity-50"></div>
                        <div class="relative flex h-28 w-28 items-center justify-center rounded-2xl {{ $servico['fundoIcone'] }} p-4 shadow-md transition-transform duration-300 group-hover:scale-110">
                            <i class="{{ $servico['icone'] }} {{ $servico['corIcone'] }} text-6xl"></i>
                        </div>
                    </div>

                    <h3 class="mb-2 text-xl font-extrabold text-gray-900">{{ $servico['titulo'] }}</h3>
                    <div class="mb-3 h-0.5 w-12 rounded-full {{ $servico['linha'] }}"></div>
                    <p class="text-sm leading-relaxed text-gray-600">{{ $servico['texto'] }}</p>

                    <a href="#contato" class="mt-4 flex items-center gap-1 text-sm font-semibold {{ $servico['link'] }} transition-all duration-300 group-hover:gap-2">
                        Saiba mais
                        <i class="fas fa-arrow-right text-xs transition-transform duration-300 group-hover:translate-x-1"></i>
                    </a>
                </article>
            @endforeach
        </div>

        <div class="px-4 pb-8 pt-12 text-center">
            <p class="mx-auto max-w-2xl text-lg text-gray-600">
                Desenvolvimento de alta performance para impulsionar seu negócio
            </p>
        </div>

        <div class="mt-12 text-center">
            <a href="#contato" class="inline-flex items-center gap-2 rounded-full bg-gradient-to-r from-gray-900 to-gray-800 px-8 py-3 font-semibold text-white shadow-lg transition-all duration-300 hover:scale-105 hover:shadow-xl">
                <span>Ver todos os serviços</span>
                <i class="fas fa-arrow-right text-sm"></i>
            </a>
        </div>
    </div>
</section>
