<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="icon" href="{{ asset('pretobranco.png') }}?v={{ filemtime(public_path('pretobranco.png')) }}" type="image/png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Contato | Dash Brasil</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Manrope:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Space+Grotesk:wght@700&display=swap"
        rel="stylesheet"
    >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <x-animation-scripts />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="portfolio-page">
    <x-navbar />

    <main class="contact-page">
        <section class="contact-hero section-animate">
            <div class="contact-hero__inner">
                <p class="eyebrow">Contato</p>
                <h1>Vamos conversar sobre o seu projeto.</h1>
                <p class="contact-hero__sub">
                    Fale com nossa equipe para tirar d&uacute;vidas, solicitar um or&ccedil;amento ou iniciar uma nova solu&ccedil;&atilde;o digital.
                </p>
            </div>
        </section>

        <section class="contact-body">
            <aside class="channels section-animate">
                <p class="channels__title">Canais diretos</p>

                <a href="mailto:dashbrasilds@gmail.com" class="channel-card" aria-label="Enviar e-mail">
                    <div class="channel-card__icon">
                        <i class="fas fa-envelope" aria-hidden="true"></i>
                    </div>
                    <div class="channel-card__info">
                        <span class="channel-card__label">E-mail</span>
                        <span class="channel-card__value">dashbrasilds@gmail.com</span>
                    </div>
                    <i class="fas fa-arrow-up-right-from-square channel-card__arrow" aria-hidden="true"></i>
                </a>

                <a
                    href="https://wa.me/5511994083005"
                    target="_blank"
                    rel="noreferrer"
                    class="channel-card"
                    aria-label="Falar no WhatsApp"
                >
                    <div class="channel-card__icon">
                        <i class="fab fa-whatsapp" aria-hidden="true"></i>
                    </div>
                    <div class="channel-card__info">
                        <span class="channel-card__label">WhatsApp</span>
                        <span class="channel-card__value">(11) 99408-3005</span>
                    </div>
                    <i class="fas fa-arrow-up-right-from-square channel-card__arrow" aria-hidden="true"></i>
                </a>

                <a
                    href="{{ route('diagnostico') }}"
                    class="channel-card"
                    aria-label="Fazer diagn&oacute;stico gratuito"
                >
                    <div class="channel-card__icon">
                        <i class="fas fa-clipboard-check" aria-hidden="true"></i>
                    </div>
                    <div class="channel-card__info">
                        <span class="channel-card__label">Diagn&oacute;stico</span>
                        <span class="channel-card__value">Gratuito e r&aacute;pido</span>
                    </div>
                    <i class="fas fa-arrow-up-right-from-square channel-card__arrow" aria-hidden="true"></i>
                </a>

                <div class="channels__time">
                    <i class="fas fa-clock" aria-hidden="true"></i>
                    <span>Atendimento de segunda a sexta, das 9h &agrave;s 18h.</span>
                </div>
            </aside>

            <section class="form-wrap section-animate">
                <p class="form-wrap__title">Envie uma mensagem</p>

                <form class="contact-form" id="contactForm" novalidate>
                    <div class="form-row form-row--split">
                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input
                                type="text"
                                id="name"
                                name="name"
                                placeholder="Seu nome"
                                required
                                autocomplete="name"
                            >
                        </div>

                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input
                                type="email"
                                id="email"
                                name="email"
                                placeholder="seu@email.com"
                                required
                                autocomplete="email"
                            >
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="subject">Assunto</label>
                        <select id="subject" name="subject" required>
                            <option value="" disabled selected>Selecione um assunto</option>
                            <option value="projeto">Novo projeto</option>
                            <option value="orcamento">Or&ccedil;amento</option>
                            <option value="suporte">Suporte</option>
                            <option value="parceria">Parceria</option>
                            <option value="outro">Outro</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="message">Mensagem</label>
                        <textarea
                            id="message"
                            name="message"
                            rows="5"
                            placeholder="Descreva brevemente o que voc&ecirc; precisa..."
                            required
                        ></textarea>
                    </div>

                    <button type="submit" class="form-submit" id="submitBtn">
                        <span id="btnText">Enviar mensagem</span>
                        <i class="fas fa-paper-plane" aria-hidden="true"></i>
                    </button>

                    <p class="form-note" id="formNote" aria-live="polite"></p>
                </form>
            </section>
        </section>
    </main>

    <x-footer />
</body>
</html>
