<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="icon" href="{{ asset('pretobranco.png') }}?v={{ filemtime(public_path('pretobranco.png')) }}" type="image/png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dash Brasil | Empresa de TI</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Manrope:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Space+Grotesk:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="portfolio-page">
    <x-navbar />

    <main>
        <section id="home" class="portfolio-hero section-animate">
            <div class="portfolio-content">
                <h1>Solu&ccedil;&otilde;es digitais para o seu neg&oacute;cio.</h1>
                <h2>Desenvolvimento, automa&ccedil;&otilde;es e suporte em tecnologia</h2>
                <p>
                    A Dash Brasil cria sites, sistemas e integra&ccedil;&otilde;es para empresas que querem melhorar
                    sua presen&ccedil;a digital, automatizar tarefas e organizar processos com tecnologia.
                </p>

                <div class="portfolio-actions">
                    <a class="portfolio-btn portfolio-btn-primary" href="{{ route('diagnostico') }}">
                        <i class="fa-solid fa-clipboard-check" aria-hidden="true"></i>
                        Diagn&oacute;stico gratuito
                    </a>
                    <a class="portfolio-btn portfolio-btn-secondary" href="{{ route('contato') }}">
                        <i class="fa-solid fa-envelope" aria-hidden="true"></i>
                        Falar conosco
                    </a>
                </div>

                <div class="portfolio-social" aria-label="Redes sociais">
                    <a href="{{ route('contato') }}" aria-label="Instagram"><i class="fab fa-instagram" aria-hidden="true"></i></a>
                    <a href="{{ route('contato') }}" aria-label="LinkedIn"><i class="fab fa-linkedin-in" aria-hidden="true"></i></a>
                    <a href="https://wa.me/5511994083005" target="_blank" rel="noreferrer" aria-label="WhatsApp"><i class="fab fa-whatsapp" aria-hidden="true"></i></a>
                </div>
            </div>

            <div class="portfolio-visual" aria-hidden="true">
                <i class="fas fa-laptop-code"></i>
            </div>
        </section>

        <x-imgproj />
        @include('components.opiniao_cards')

        
    </main>

    <div id="contato">
        <x-footer />
    </div>
</body>
</html>
