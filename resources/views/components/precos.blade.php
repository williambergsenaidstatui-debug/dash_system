@php
    $whatsappMessages = [
        'front' => 'conversar com o time. Quero saber mais sobre esse plano: Front-End',
        'backend' => 'conversar com o time. Quero saber mais sobre esse plano: API/Back-end',
        'fullstack' => 'conversar com o time. Quero saber mais sobre esse plano: Full Stack',
    ];
@endphp

<section id="precos" class="pricing-section section-animate" aria-labelledby="pricing-title">
    <div class="pricing-container">
        <div class="pricing-heading">
            <p class="projects-kicker">Nossos pre&ccedil;os</p>
            <h3 class="projects-title" id="pricing-title">Planos para come&ccedil;ar com clareza.</h3>
            <p>
                Valores iniciais para orientar seu projeto. O escopo final pode variar conforme funcionalidades,
                integra&ccedil;&otilde;es e prazo de entrega.
            </p>
        </div>

        <div class="pricing-grid">
            <article class="pricing-card section-animate">
                <div>
                    <span class="pricing-label">Site essencial</span>
                    <h4>Front-End</h4>
                    <p class="pricing-price"></p>
                    <p class="pricing-description">
                        Ideal para landing pages, p&aacute;ginas institucionais e interfaces responsivas.
                    </p>
                </div>

                <ul class="pricing-list">
                    <li><i class="fas fa-check"></i>Layout responsivo</li>
                    <li><i class="fas fa-check"></i>Se&ccedil;&otilde;es institucionais</li>
                    <li><i class="fas fa-check"></i>Bot&otilde;es de contato e WhatsApp</li>
                    <li><i class="fas fa-check"></i>Ajustes visuais b&aacute;sicos</li>
                </ul>

                <div class="pricing-tech">
                    <strong>Frameworks e linguagens</strong>
                    <div class="pricing-tags" aria-label="Tecnologias de front-end">
                        <span>HTML</span>
                        <span>CSS</span>
                        <span>JavaScript</span>
                        <span>Tailwind</span>
                        <span>Bootstrap</span>
                        <span>React</span>
                        <span>Vue</span>
                    </div>
                </div>

                <a class="portfolio-btn portfolio-btn-secondary pricing-btn" href="https://api.whatsapp.com/send?phone=5515998198163&text={{ rawurlencode($whatsappMessages['front']) }}" target="_blank" rel="noreferrer">
                    Solicitar proposta
                </a>
            </article>

            <article class="pricing-card pricing-card-featured section-animate">
                <div>
                    <span class="pricing-label">Integra&ccedil;&otilde;es</span>
                    <h4>API/Back-end</h4>
                    <p class="pricing-price"></p>
                    <p class="pricing-description">
                        Para conectar sistemas, automatizar fluxos e organizar dados entre ferramentas.
                    </p>
                </div>

                <ul class="pricing-list">
                    <li><i class="fas fa-check"></i>Planejamento de endpoints</li>
                    <li><i class="fas fa-check"></i>Integra&ccedil;&atilde;o com sistemas externos</li>
                    <li><i class="fas fa-check"></i>Automa&ccedil;&otilde;es de processos</li>
                    <li><i class="fas fa-check"></i>Testes e documenta&ccedil;&atilde;o inicial</li>
                </ul>

                <div class="pricing-tech">
                    <strong>Frameworks e linguagens</strong>
                    <div class="pricing-tags" aria-label="Tecnologias de API e back-end">
                        <span>PHP</span>
                        <span>Laravel</span>
                        <span>Node.js</span>
                        <span>JavaScript</span>
                        <span>MySQL</span>
                        <span>REST API</span>
                        <span>Postman</span>
                    </div>
                </div>

                <a class="portfolio-btn portfolio-btn-primary pricing-btn" href="https://api.whatsapp.com/send?phone=5515998198163&text={{ rawurlencode($whatsappMessages['backend']) }}" target="_blank" rel="noreferrer">
                    Conversar com o time
                </a>
            </article>

            <article class="pricing-card section-animate">
                <div>
                    <span class="pricing-label">Sob medida</span>
                    <h4>Full Stack</h4>
                    <p class="pricing-price">Sob consulta</p>
                    <p class="pricing-description">
                        Sistemas completos com painel, banco de dados, autentica&ccedil;&atilde;o e regras de neg&oacute;cio.
                    </p>
                </div>

                <ul class="pricing-list">
                    <li><i class="fas fa-check"></i>Frontend e backend</li>
                    <li><i class="fas fa-check"></i>Painel administrativo</li>
                    <li><i class="fas fa-check"></i>Banco de dados e seguran&ccedil;a</li>
                    <li><i class="fas fa-check"></i>Suporte na publica&ccedil;&atilde;o</li>
                </ul>

                <div class="pricing-tech">
                    <strong>Frameworks e linguagens</strong>
                    <div class="pricing-tags" aria-label="Tecnologias full stack">
                        <span>Laravel</span>
                        <span>React</span>
                        <span>Vue</span>
                        <span>Tailwind</span>
                        <span>PHP</span>
                        <span>JavaScript</span>
                        <span>MySQL</span>
                         <span>HTML</span>
                        <span>CSS</span>
                        <span>JavaScript</span>
                        <span>Tailwind</span>
                        <span>Bootstrap</span>
                        <span>React</span>
                        <span>Vue</span>
                    </div>
                </div>


                <a class="portfolio-btn portfolio-btn-secondary pricing-btn" href="https://api.whatsapp.com/send?phone=5515998198163&text={{ rawurlencode($whatsappMessages['fullstack']) }}" target="_blank" rel="noreferrer">
                    Conversar com o time
                </a>
            </article>
        </div>
    </div>
</section>
