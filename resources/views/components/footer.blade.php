<footer class="mt-20 bg-white shadow-lg">
    <div class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-4">
            <div class="space-y-4">
                <div class="flex items-center space-x-2">
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-black">
                        <span class="text-lg font-bold text-white">D</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900">Dash Brasil</h3>
                </div>
                <p class="text-sm leading-relaxed text-gray-600">
                    Estamos focados no desenvolvimento web, automações e soluções tecnológicas sob medida para empresas.
                    Transformando ideias em realidade digital.
                </p>
                <div class="flex flex-wrap gap-2 pt-2">
                    <a href="{{ route('contato') }}" aria-label="Instagram" class="inline-flex h-9 w-9 items-center justify-center rounded-lg bg-gray-900 text-white transition-all duration-300 hover:scale-110 hover:bg-gray-700">
                        <i class="fab fa-instagram text-sm"></i>
                    </a>
                    <a href="https://wa.me/5511994083005" target="_blank" rel="noreferrer" aria-label="WhatsApp" class="inline-flex h-9 w-9 items-center justify-center rounded-lg bg-green-600 text-white transition-all duration-300 hover:scale-110 hover:bg-green-700">
                        <i class="fab fa-whatsapp text-sm"></i>
                    </a>
                    <a href="{{ route('contato') }}" aria-label="LinkedIn" class="inline-flex h-9 w-9 items-center justify-center rounded-lg bg-blue-700 text-white transition-all duration-300 hover:scale-110 hover:bg-blue-800">
                        <i class="fab fa-linkedin-in text-sm"></i>
                    </a>
                    <a href="{{ route('diagnostico') }}" aria-label="Diagnóstico gratuito" class="inline-flex h-9 w-9 items-center justify-center rounded-lg bg-purple-600 text-white transition-all duration-300 hover:scale-110 hover:bg-purple-700">
                        <i class="fas fa-clipboard-check text-sm"></i>
                    </a>
                </div>
            </div>

            <div class="space-y-4">
                <h3 class="relative inline-block text-lg font-bold text-gray-900">
                    Links Rápidos
                    <span class="absolute -bottom-2 left-0 h-0.5 w-8 rounded-full bg-black"></span>
                </h3>
                <ul class="space-y-2.5">
                    <li><a href="{{ route('inicio') }}" class="footer-link"><i class="fas fa-chevron-right"></i><span>Home</span></a></li>
                    <li><a href="{{ route('sobre') }}" class="footer-link"><i class="fas fa-chevron-right"></i><span>Sobre</span></a></li>
                    <li><a href="{{ route('servicos') }}" class="footer-link"><i class="fas fa-chevron-right"></i><span>Serviços</span></a></li>
                    <li><a href="{{ route('diagnostico') }}" class="footer-link"><i class="fas fa-chevron-right"></i><span>Diagnóstico</span></a></li>
                    <li><a href="{{ route('contato') }}" class="footer-link"><i class="fas fa-chevron-right"></i><span>Contato</span></a></li>
                </ul>
            </div>

            <div class="space-y-4">
                <h3 class="relative inline-block text-lg font-bold text-gray-900">
                    Contato
                    <span class="absolute -bottom-2 left-0 h-0.5 w-8 rounded-full bg-black"></span>
                </h3>
                <ul class="space-y-3">
                    <li class="group flex items-start gap-3 text-sm text-gray-600">
                        <i class="fas fa-map-marker-alt mt-0.5 text-gray-900 transition-transform duration-300 group-hover:scale-110"></i>
                        <span>Tatuí, SP - Brasil</span>
                    </li>
                    <li class="group flex items-center gap-3 text-sm text-gray-600">
                        <i class="fas fa-envelope text-gray-900 transition-transform duration-300 group-hover:scale-110"></i>
                        <a href="mailto:dashbrasilds@gmail.com" class="transition-colors hover:text-gray-900">dashbrasilds@gmail.com</a>
                    </li>
                    <li class="group flex items-center gap-3 text-sm text-gray-600">
                        <i class="fab fa-whatsapp text-green-600 transition-transform duration-300 group-hover:scale-110"></i>
                        <a href="tel:+5511994083005" class="transition-colors hover:text-gray-900">(11) 99408-3005</a>
                    </li>
                    <li class="flex items-center gap-3 text-sm text-gray-600">
                        <i class="fas fa-clock text-gray-900"></i>
                        <span>Seg-Sex: 9h às 18h</span>
                    </li>
                </ul>
            </div>

            <div class="space-y-4">
                <h3 class="relative inline-block text-lg font-bold text-gray-900">
                    Deixe o seu feedback
                    <span class="absolute -bottom-2 left-0 h-0.5 w-8 rounded-full bg-black"></span>
                </h3>
                <p class="text-sm leading-relaxed text-gray-600">
                    Queremos saber o que você achou sobre nosso serviço. Ajude a nossa equipe com sua avaliação.
                </p>
                <form class="space-y-3" action="{{ route('contato') }}" method="GET">
                    <div class="relative">
                        <i class="fas fa-comment absolute left-3 top-1/2 -translate-y-1/2 text-sm text-gray-400"></i>
                        <input type="text" placeholder="Seu feedback" required class="w-full rounded-lg border border-gray-300 py-2.5 pl-10 pr-3 text-sm outline-none transition-all duration-300 focus:border-gray-900 focus:ring-2 focus:ring-gray-200">
                    </div>
                    <div class="relative">
                        <i class="fas fa-user absolute left-3 top-1/2 -translate-y-1/2 text-sm text-gray-400"></i>
                        <input type="text" placeholder="Seu nome completo" required class="w-full rounded-lg border border-gray-300 py-2.5 pl-10 pr-3 text-sm outline-none transition-all duration-300 focus:border-gray-900 focus:ring-2 focus:ring-gray-200">
                    </div>
                    <button type="submit" class="w-full rounded-lg bg-gray-900 px-4 py-2.5 text-sm font-semibold text-white shadow-md transition-all duration-300 hover:scale-[1.02] hover:bg-gray-800 hover:shadow-lg active:scale-95">
                        <i class="fas fa-paper-plane mr-2"></i>
                        Enviar Mensagem
                    </button>
                </form>
            </div>
        </div>

        <div class="mt-8 border-t border-gray-200 pt-8">
            <div class="flex flex-col items-center justify-between gap-4 text-center md:flex-row">
                <p class="text-xs text-gray-500">
                    &copy; 2026 Todos os direitos reservados | Desenvolvido por
                    <a href="{{ route('inicio') }}" class="font-semibold text-gray-900 hover:underline">Dash Brasil</a>
                </p>
                <div class="flex gap-4 text-xs text-gray-500">
                    <a href="#" class="transition-colors hover:text-gray-900">Política de Privacidade</a>
                    <span>&bull;</span>
                    <a href="#" class="transition-colors hover:text-gray-900">Termos de Uso</a>
                    <span>&bull;</span>
                    <a href="#" class="transition-colors hover:text-gray-900">Cookies</a>
                </div>
            </div>
        </div>
    </div>
</footer>
