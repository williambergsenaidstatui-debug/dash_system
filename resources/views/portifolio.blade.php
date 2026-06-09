<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dash System | Empresa de TI</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Manrope:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Space+Grotesk:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="portfolio-page">
    <x-navbar />

    <main>
        <section id="home" class="portfolio-hero">
            <div class="portfolio-content">
                <h1>Soluções digitais para o seu negócio.</h1>
                <h2>Desenvolvimento, automações e suporte em tecnologia</h2>
                <p>
                    A Dash System cria sites, sistemas e integrações para empresas que querem melhorar
                    sua presença digital, automatizar tarefas e organizar processos com tecnologia.
                </p>

                <div class="portfolio-actions">
                    <a class="portfolio-btn portfolio-btn-primary" href="{{ route('diagnostico') }}">
                        <i class="fa-solid fa-clipboard-check" aria-hidden="true"></i>
                        Diagnóstico gratuito
                    </a>
                    <a class="portfolio-btn portfolio-btn-secondary" href="#contato">
                        <i class="fa-solid fa-envelope" aria-hidden="true"></i>
                        Falar conosco
                    </a>
                </div>

                <div class="portfolio-social" aria-label="Redes sociais">
                    <a href="#" aria-label="Instagram"><i class="fab fa-instagram" aria-hidden="true"></i></a>
                    <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in" aria-hidden="true"></i></a>
                    <a href="#" aria-label="WhatsApp"><i class="fab fa-whatsapp" aria-hidden="true"></i></a>
                </div>
            </div>

            <div class="portfolio-visual" aria-hidden="true">
                <i class="fas fa-laptop-code"></i>
            </div>
        </section>

        <section id="servicos" class="portfolio-services">
          

        <x-imgproj />
    </main>

    <div id="contato">
        <x-footer />
    </div>
</body>
</html>
