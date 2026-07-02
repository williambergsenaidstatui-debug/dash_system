@php
    $servicos = [
        [
            'titulo' => 'Front-End',
            'texto' => 'Interfaces modernas, rapidas e responsivas com React, Vue e Tailwind CSS.',
            'icone' => 'fab fa-html5',
        ],
        [
            'titulo' => 'Back-End',
            'texto' => 'Sistemas robustos utilizando PHP, Laravel e Node.js com alta performance.',
            'icone' => 'fas fa-database',
        ],
        [
            'titulo' => 'APIs',
            'texto' => 'Integracoes inteligentes para automatizar processos e conectar sistemas.',
            'icone' => 'fas fa-plug',
        ],
        [
            'titulo' => 'Seguranca',
            'texto' => 'Boas praticas para aplicacoes mais seguras e protecao de dados.',
            'icone' => 'fas fa-shield-alt',
        ],
    ];
@endphp

<section class="px-4 py-12">
    <div class="mx-auto max-w-6xl">
        <div class="grid grid-cols-1 justify-items-center gap-8 sm:grid-cols-2 lg:grid-cols-4">
            @foreach ($servicos as $servico)
                @php
                    $whatsappUrl = 'https://api.whatsapp.com/send?phone=5515998198163&text=' . rawurlencode('conversar com o time. Quero saber mais sobre esse plano: ' . $servico['titulo']);
                @endphp

                <article class="card-hover group relative flex h-full w-full max-w-[280px] flex-col items-center rounded-lg border border-gray-200 bg-white p-6 text-center shadow-lg transition-all duration-300 hover:shadow-2xl">
                    <div class="relative mb-4">
                        <div class="relative flex h-28 w-28 items-center justify-center rounded-lg bg-gray-100 p-4 shadow-md transition-transform duration-300 group-hover:scale-105">
                            <i class="{{ $servico['icone'] }} text-6xl text-gray-900"></i>
                        </div>
                    </div>

                    <h3 class="mb-2 text-xl font-extrabold text-gray-900">{{ $servico['titulo'] }}</h3>
                    <div class="mb-3 h-0.5 w-12 rounded-full bg-gray-900"></div>
                    <p class="text-sm leading-relaxed text-gray-600">{{ $servico['texto'] }}</p>

                    <a href="{{ $whatsappUrl }}" target="_blank" rel="noreferrer" class="mt-6 inline-flex min-h-[44px] w-full items-center justify-center gap-2 rounded-full bg-gray-900 px-4 text-sm font-bold text-white shadow-md transition-all duration-300 hover:bg-black hover:shadow-lg">
                        Saiba mais
                        <i class="fab fa-whatsapp text-base"></i>
                    </a>
                </article>
            @endforeach
        </div>

     

    </div>
</section>
