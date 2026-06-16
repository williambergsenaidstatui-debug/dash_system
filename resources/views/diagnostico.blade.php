<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <link rel="icon" href="{{ asset('pretobranco.png') }}?v={{ filemtime(public_path('pretobranco.png')) }}" type="image/png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diagnóstico Gratuito - Dash Brasil</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="diagnostico-page">
    <nav class="diagnostico-nav">
        <a class="diagnostico-logo" href="{{ route('inicio') }}">Dash Brasil</a>
        <a class="diagnostico-back" href="{{ route('inicio') }}">&larr; Voltar ao site</a>
    </nav>

    <header class="diagnostico-header section-animate">
        <p class="diagnostico-eyebrow">Diagnóstico gratuito &middot; 2 minutos</p>
        <h1>Entenda onde sua empresa pode evoluir com tecnologia.</h1>
        <p>
            Responda algumas perguntas rápidas para identificarmos oportunidades de melhoria
            em atendimento, presença digital, automação e organização dos processos.
        </p>
    </header>

    <main>
        <section class="progress-wrap section-animate" aria-label="Progresso do diagnóstico">
            <div class="progress-labels">
                <span id="step-label">Passo 1 de 5</span>
                <span id="pct-label">20%</span>
            </div>
            <div class="progress-bar">
                <div class="progress-fill" id="progress-fill"></div>
            </div>
        </section>

        <section class="diagnostico-card section-animate" id="quiz-card">
            <div class="step active" id="s1">
                <p class="step-q">Em qual área sua empresa atua?</p>
                <p class="step-hint">Essa informação ajuda a direcionar melhor as sugestões para a realidade do seu mercado.</p>

                <div class="options">
                    <button type="button" class="opt" data-step="s1" data-val="comercio"><span class="opt-icon">🛒</span><span><strong>Comércio e varejo</strong><small>Lojas físicas, virtuais ou operações híbridas</small></span></button>
                    <button type="button" class="opt" data-step="s1" data-val="servicos"><span class="opt-icon">🛠</span><span><strong>Prestadores de serviços</strong><small>Consultorias, assistências, escritórios e atendimentos</small></span></button>
                    <button type="button" class="opt" data-step="s1" data-val="saude"><span class="opt-icon">🏥</span><span><strong>Saúde e bem-estar</strong><small>Clínicas, consultórios, estéticas e profissionais da área</small></span></button>
                    <button type="button" class="opt" data-step="s1" data-val="educacao"><span class="opt-icon">📚</span><span><strong>Educação</strong><small>Escolas, cursos, treinamentos e infoprodutos</small></span></button>
                    <button type="button" class="opt" data-step="s1" data-val="industria"><span class="opt-icon">🏭</span><span><strong>Indústria e logística</strong><small>Produção, transporte, estoque e operações</small></span></button>
                    <button type="button" class="opt" data-step="s1" data-val="outro"><span class="opt-icon">💼</span><span><strong>Outro segmento</strong><small>A empresa atua em uma área diferente das opções</small></span></button>
                </div>

                <div class="btn-row">
                    <button type="button" class="diag-btn primary" data-next="2" id="btn-s1" disabled>Continuar &rarr;</button>
                </div>
            </div>

            <div class="step" id="s2">
                <p class="step-q">Quais pontos mais prejudicam a rotina da empresa hoje?</p>
                <p class="step-hint">Marque todas as opções que fazem sentido. Isso ajuda a identificar prioridades.</p>

                <div class="options col1">
                    <button type="button" class="opt" data-multi="true" data-val="clientes"><span class="opt-icon">😤</span><span><strong>Atendimento lento ou pouco organizado</strong><small>Clientes esperam muito ou ficam sem retorno</small></span></button>
                    <button type="button" class="opt" data-multi="true" data-val="manual"><span class="opt-icon">📋</span><span><strong>Muitas tarefas repetitivas e manuais</strong><small>Planilhas, mensagens, cadastros e controles feitos à mão</small></span></button>
                    <button type="button" class="opt" data-multi="true" data-val="visibilidade"><span class="opt-icon">🔎</span><span><strong>Baixa presença digital</strong><small>A empresa não transmite profissionalismo ou não aparece bem online</small></span></button>
                    <button type="button" class="opt" data-multi="true" data-val="controle"><span class="opt-icon">📊</span><span><strong>Falta de controle sobre informações importantes</strong><small>Pedidos, clientes, agenda, estoque ou financeiro ficam espalhados</small></span></button>
                    <button type="button" class="opt" data-multi="true" data-val="integracao"><span class="opt-icon">🔗</span><span><strong>Ferramentas que não se conectam</strong><small>A equipe usa sistemas diferentes e precisa repetir dados</small></span></button>
                </div>

                <div class="btn-row">
                    <button type="button" class="diag-btn" data-next="1">&larr; Voltar</button>
                    <button type="button" class="diag-btn primary" data-next="3" id="btn-s2" disabled>Continuar &rarr;</button>
                </div>
            </div>

            <div class="step" id="s3">
                <p class="step-q">Quanto tempo a equipe perde por semana com tarefas que poderiam ser automatizadas?</p>
                <p class="step-hint">Considere atendimento, preenchimento de planilhas, envio de mensagens, relatórios e conferências manuais.</p>

                <div class="options">
                    <button type="button" class="opt" data-step="s3" data-val="2"><span class="opt-icon">😌</span><span><strong>Menos de 2 horas</strong><small>A rotina já está relativamente organizada</small></span></button>
                    <button type="button" class="opt" data-step="s3" data-val="5"><span class="opt-icon">😐</span><span><strong>De 2 a 5 horas</strong><small>Existem gargalos pequenos, mas frequentes</small></span></button>
                    <button type="button" class="opt" data-step="s3" data-val="10"><span class="opt-icon">😓</span><span><strong>De 5 a 10 horas</strong><small>A operação já perde produtividade de forma clara</small></span></button>
                    <button type="button" class="opt" data-step="s3" data-val="20"><span class="opt-icon">🥵</span><span><strong>Mais de 10 horas</strong><small>A empresa precisa de automação com prioridade</small></span></button>
                </div>

                <div class="btn-row">
                    <button type="button" class="diag-btn" data-next="2">&larr; Voltar</button>
                    <button type="button" class="diag-btn primary" data-next="4" id="btn-s3" disabled>Continuar &rarr;</button>
                </div>
            </div>

            <div class="step" id="s4">
                <p class="step-q">Quais canais e ferramentas digitais sua empresa já utiliza?</p>
                <p class="step-hint">Marque o que já existe hoje, mesmo que ainda precise melhorar.</p>

                <div class="options">
                    <button type="button" class="opt" data-multi="true" data-val="site"><span class="opt-icon">🌐</span><span><strong>Site próprio</strong><small>Institucional, landing page ou loja virtual</small></span></button>
                    <button type="button" class="opt" data-multi="true" data-val="instagram"><span class="opt-icon">📸</span><span><strong>Redes sociais</strong><small>Instagram, Facebook, LinkedIn ou outros canais</small></span></button>
                    <button type="button" class="opt" data-multi="true" data-val="whatsapp"><span class="opt-icon">💬</span><span><strong>WhatsApp Business</strong><small>Canal de atendimento, vendas ou suporte</small></span></button>
                    <button type="button" class="opt" data-multi="true" data-val="sistema"><span class="opt-icon">💻</span><span><strong>Sistema interno ou ERP</strong><small>Controle de pedidos, estoque, clientes ou financeiro</small></span></button>
                    <button type="button" class="opt" data-multi="true" data-val="nenhum"><span class="opt-icon">🚫</span><span><strong>Ainda não usamos ferramentas digitais</strong><small>A empresa está começando sua estrutura digital</small></span></button>
                </div>

                <div class="btn-row">
                    <button type="button" class="diag-btn" data-next="3">&larr; Voltar</button>
                    <button type="button" class="diag-btn primary" data-next="5" id="btn-s4" disabled>Continuar &rarr;</button>
                </div>
            </div>

            <div class="step" id="s5">
                <p class="step-q">Para quem devemos enviar o diagnóstico?</p>
                <p class="step-hint">Com esses dados, nosso time consegue retornar com sugestões mais alinhadas à sua empresa.</p>

                <input type="text" class="text-input contact-field" id="inp-nome" placeholder="Seu nome">
                <input type="text" class="text-input contact-field" id="inp-empresa" placeholder="Nome da empresa">
                <input type="text" class="text-input contact-field" id="inp-whatsapp" placeholder="WhatsApp (com DDD)">
                <input type="email" class="text-input" id="inp-email" placeholder="E-mail (opcional)">

                <div class="btn-row">
                    <button type="button" class="diag-btn" data-next="4">&larr; Voltar</button>
                    <button type="button" class="diag-btn primary" id="btn-s5" disabled>Ver meu diagnóstico &rarr;</button>
                </div>
            </div>
        </section>

        <section class="diagnostico-card section-animate" id="result">
            <div class="result-header">
                <div class="result-icon">✓</div>
                <div>
                    <h2>Diagnóstico pronto, <span id="res-nome"></span>!</h2>
                    <p>Identificamos pontos que podem melhorar a operação digital da empresa.</p>
                </div>
            </div>

            <div class="score-row">
                <div class="score-card"><div class="score-val text-green" id="score-oport">-</div><div class="score-label">frentes de melhoria</div></div>
                <div class="score-card"><div class="score-val" id="score-horas">-</div><div class="score-label">horas semanais recuperáveis</div></div>
                <div class="score-card"><div class="score-val" id="score-prioridade">Alta</div><div class="score-label">prioridade recomendada</div></div>
            </div>

            <div class="diagnosis-box">
                <h3>Principais pontos de atenção</h3>
                <div id="diag-list"></div>
            </div>

            <div class="diagnosis-box">
                <h3>Como a Dash Brasil pode ajudar</h3>
                <div id="solucoes-list"></div>
            </div>

            <div class="tags" id="tags-list"></div>

            <div class="cta-final">
                <div>
                    <h3>Quer transformar esse diagnóstico em um plano de ação?</h3>
                    <p>Agende uma conversa gratuita com nosso time para entender as melhores soluções.</p>
                </div>
                <a href="https://wa.me/5511999999999?text=Ola!%20Fiz%20o%20diagnostico%20no%20site%20e%20quero%20conversar." target="_blank" rel="noreferrer">
                    Agendar reunião &rarr;
                </a>
            </div>
        </section>
    </main>
</body>
</html>
