<section class="projects-section section-animate" id="projetos">
    <div class="projects-container">
        <p class="projects-kicker">Projetos</p>
        <h3 class="projects-title">Solu&ccedil;&otilde;es digitais criadas para empresas reais.</h3>

        <div class="projects-grid">
        <article class="project-card section-animate">
            <img class="project-image" src="{{ asset('image.png') }}" alt="Dashboard de sistema desenvolvido pela Dash Brasil">
            <div class="project-copy">
                <h4>Sistemas sob medida</h4>
                <p>
                    Criamos pain&eacute;is, automa&ccedil;&otilde;es e fluxos digitais para organizar opera&ccedil;&otilde;es, reduzir tarefas manuais
                    e dar mais clareza para a tomada de decis&atilde;o.
                </p>
            </div>
        </article>

        <article class="project-card section-animate">
            <img class="project-image" src="{{ asset('wlcars.png') }}" alt="Projeto visual de site institucional">
            <div class="project-copy">
                <h4>Sites institucionais</h4>
                <p>
                    Presen&ccedil;a digital com layout responsivo, carregamento r&aacute;pido e conte&uacute;do pensado para apresentar
                    sua empresa com profissionalismo.
                </p>
            </div>
        </article>

        <article class="project-card section-animate">
            <img class="project-image" src="{{ asset('computer.jpg') }}" alt="Interface de tecnologia e atendimento digital">
            <div class="project-copy">
                <h4>Integracoes e suporte</h4>
                <p>
                    Conectamos ferramentas, melhoramos processos existentes e acompanhamos sua equipe para a tecnologia
                    funcionar no dia a dia.
                </p>
            </div>
        </article>
        </div>

        @if (request()->routeIs('projetos'))
            <a class="portfolio-btn portfolio-btn-primary btn-center" href="{{ route('contato') }}">
                <i class="fa-solid fa-message" aria-hidden="true"></i>
                Falar sobre um projeto
            </a>
        @else
            <a class="portfolio-btn portfolio-btn-primary btn-center" href="{{ route('projetos') }}">
                <i class="fa-solid fa-layer-group" aria-hidden="true"></i>
                Ver projetos
            </a>
        @endif
    </div>
</section>
