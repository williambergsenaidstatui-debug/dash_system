<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <link rel="icon" href="{{ asset('pretobranco.png') }}?v={{ filemtime(public_path('pretobranco.png')) }}" type="image/png">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@isset($pageTitle){{ $pageTitle }}@else Acesso | Brasil Dash  @endisset</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Manrope:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Space+Grotesk:wght@700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

        <x-animation-scripts />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="portfolio-page">
        <x-navbar />

        <main class="contact-page auth-page">
            <section class="contact-hero auth-hero section-animate">
                <div class="contact-hero__inner">
                    <p class="eyebrow">@isset($eyebrow){{ $eyebrow }}@else  @endisset</p>

                    <p class="contact-hero__sub">
                        @isset($subheading)
                            {{ $subheading }}
                        @else
                            Acesse sua conta para continuar.
                        @endisset
                    </p>
                </div>
            </section>

            <section class="contact-body auth-body">


                <section class="form-wrap auth-form-wrap section-animate">
                    <p class="form-wrap__title">@isset($formTitle){{ $formTitle }}@else Identifica&ccedil;&atilde;o @endisset</p>
                    {{ $slot }}
                </section>
            </section>
        </main>

        <x-footer />
    </body>
</html>
