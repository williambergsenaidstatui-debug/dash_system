<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sobre N&oacute;s | Dash System</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
  <x-navbar />

  <main class="about-page">
    <section class="hero section-animate">
      <div class="hero__content">
        <div class="hero__copy">
          <h1>Constru&iacute;mos solu&ccedil;&otilde;es digitais com clareza e prop&oacute;sito.</h1>
          <p class="hero__text">
            A Dash System une estrat&eacute;gia, tecnologia e experi&ecirc;ncia do usu&aacute;rio para criar produtos digitais que funcionam bem no dia a dia e crescem junto com o neg&oacute;cio.
          </p>
        </div>

        <div class="hero__logo-card" aria-label="Dash">
          <img src="{{ asset('dashft.png') }}" alt="Dash">
        </div>
      </div>
    </section>

    <div class="content-grid">
      <section class="text-block section-animate">
        <span class="section-number">01</span>
        <div>
          <h2>Nossa miss&atilde;o</h2>
          <p>
            Ajudamos empresas a organizar processos, criar plataformas digitais e melhorar a forma como se relacionam com seus clientes. Nosso foco &eacute; transformar ideias em sistemas simples de usar, bonitos e f&aacute;ceis de manter.
          </p>
        </div>
      </section>

      <section class="text-block section-animate">
        <span class="section-number">02</span>
        <div>
          <h2>Como pensamos</h2>
          <p>
            Um bom produto digital n&atilde;o precisa ser complicado. Ele precisa resolver o problema certo, ter uma interface clara e entregar uma experi&ecirc;ncia consistente para quem usa.
          </p>
        </div>
      </section>
    </div>

    <section class="values section-animate" aria-label="Valores da empresa">
      <article class="value-card">
        <span>Clareza</span>
        <p>Traduzimos necessidades reais em solu&ccedil;&otilde;es objetivas.</p>
      </article>
      <article class="value-card">
        <span>Qualidade</span>
        <p>Cuidamos da estrutura, da interface e da experi&ecirc;ncia.</p>
      </article>
      <article class="value-card">
        <span>Parceria</span>
        <p>Trabalhamos perto do cliente para evoluir com o projeto.</p>
      </article>
    </section>

    <section class="process section-animate">
      <p class="eyebrow">Como trabalhamos</p>
      <h2>Do diagn&oacute;stico &agrave; entrega, cada etapa tem inten&ccedil;&atilde;o.</h2>
      <div class="steps">
        <div class="step">
          <strong>01</strong>
          <span>Diagn&oacute;stico</span>
        </div>
        <div class="step">
          <strong>02</strong>
          <span>Planejamento</span>
        </div>
        <div class="step">
          <strong>03</strong>
          <span>Desenvolvimento</span>
        </div>
        <div class="step">
          <strong>04</strong>
          <span>Entrega</span>
        </div>
      </div>
    </section>

         <x-time />
  </main>

  <x-footer />
</body>
</html>
