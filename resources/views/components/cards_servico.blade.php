<style>
        * {
            font-family: 'Inter', sans-serif;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        @keyframes pulse-glow {
            0%, 100% { opacity: 0.6; }
            50% { opacity: 1; }
        }

        .card-hover {
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .card-hover:hover {
            transform: translateY(-12px);
            box-shadow: 0 20px 40px -12px rgba(0, 0, 0, 0.3);
        }
    </style>
    <!-- Cabeçalho da seção -->
    <section class="px-4 py-12">
        <div class="mx-auto max-w-6xl">
            <div class="grid grid-cols-1 justify-items-center gap-8 sm:grid-cols-2 lg:grid-cols-4">

                <!-- Card 1 - Front-End -->
                <div class="group relative flex h-auto w-full max-w-[280px] flex-col items-center rounded-2xl bg-white p-6 text-center shadow-lg transition-all duration-300 hover:shadow-2xl card-hover">


                    <!-- Ícone/Imagem -->
                    <div class="mb-4 relative">
                        <div class="absolute inset-0 bg-gradient-to-br from-blue-400 to-blue-600 rounded-2xl blur-xl opacity-30 group-hover:opacity-50 transition-opacity duration-300"></div>
                        <div class="relative bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-4 w-28 h-28 flex items-center justify-center shadow-md group-hover:scale-110 transition-transform duration-300">
                            <i class="fab fa-html5 text-6xl text-orange-600"></i>
                        </div>
                    </div>

                    <h3 class="text-xl font-extrabold text-gray-900 mb-2">Front-End</h3>
                    <div class="w-12 h-0.5 bg-gradient-to-r from-blue-500 to-blue-600 mb-3 rounded-full"></div>
                    <p class="text-gray-600 text-sm leading-relaxed">Interfaces modernas, rápidas e responsivas com React, Vue e Tailwind CSS.</p>

                    <!-- Link saiba mais -->
                    <a href="#" class="mt-4 text-blue-600 text-sm font-semibold flex items-center gap-1 group-hover:gap-2 transition-all duration-300">
                        Saiba mais
                        <i class="fas fa-arrow-right text-xs group-hover:translate-x-1 transition-transform duration-300"></i>
                    </a>
                </div>

                <!-- Card 2 - Back-End -->
                <div class="group relative flex h-auto w-full max-w-[280px] flex-col items-center rounded-2xl bg-white p-6 text-center shadow-lg transition-all duration-300 hover:shadow-2xl card-hover">
                    <div class="mb-4 relative">
                        <div class="absolute inset-0 bg-gradient-to-br from-purple-400 to-purple-600 rounded-2xl blur-xl opacity-30 group-hover:opacity-50 transition-opacity duration-300"></div>
                        <div class="relative bg-gradient-to-br from-purple-50 to-purple-100 rounded-2xl p-4 w-28 h-28 flex items-center justify-center shadow-md group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-database text-6xl text-purple-700"></i>
                        </div>
                    </div>

                    <h3 class="text-xl font-extrabold text-gray-900 mb-2">Back-End</h3>
                    <div class="w-12 h-0.5 bg-gradient-to-r from-purple-500 to-purple-600 mb-3 rounded-full"></div>
                    <p class="text-gray-600 text-sm leading-relaxed">Sistemas robustos utilizando PHP, Laravel e Node.js com alta performance.</p>

                    <a href="#" class="mt-4 text-purple-600 text-sm font-semibold flex items-center gap-1 group-hover:gap-2 transition-all duration-300">
                        Saiba mais
                        <i class="fas fa-arrow-right text-xs group-hover:translate-x-1 transition-transform duration-300"></i>
                    </a>
                </div>

                <!-- Card 3 - APIs -->
                <div class="group relative flex h-auto w-full max-w-[280px] flex-col items-center rounded-2xl bg-white p-6 text-center shadow-lg transition-all duration-300 hover:shadow-2xl card-hover">
                    <div class="mb-4 relative">
                        <div class="absolute inset-0 bg-gradient-to-br from-green-400 to-green-600 rounded-2xl blur-xl opacity-30 group-hover:opacity-50 transition-opacity duration-300"></div>
                        <div class="relative bg-gradient-to-br from-green-50 to-green-100 rounded-2xl p-4 w-28 h-28 flex items-center justify-center shadow-md group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-plug text-6xl text-green-600"></i>
                        </div>
                    </div>

                    <h3 class="text-xl font-extrabold text-gray-900 mb-2">APIs</h3>
                    <div class="w-12 h-0.5 bg-gradient-to-r from-green-500 to-green-600 mb-3 rounded-full"></div>
                    <p class="text-gray-600 text-sm leading-relaxed">Integrações inteligentes para automatizar processos e conectar sistemas.</p>

                    <a href="#" class="mt-4 text-green-600 text-sm font-semibold flex items-center gap-1 group-hover:gap-2 transition-all duration-300">
                        Saiba mais
                        <i class="fas fa-arrow-right text-xs group-hover:translate-x-1 transition-transform duration-300"></i>
                    </a>
                </div>

                <!-- Card 4 - Segurança -->
                <div class="group relative flex h-auto w-full max-w-[280px] flex-col items-center rounded-2xl bg-white p-6 text-center shadow-lg transition-all duration-300 hover:shadow-2xl card-hover">
                    <div class="mb-4 relative">
                        <div class="absolute inset-0 bg-gradient-to-br from-red-400 to-red-600 rounded-2xl blur-xl opacity-30 group-hover:opacity-50 transition-opacity duration-300"></div>
                        <div class="relative bg-gradient-to-br from-red-50 to-red-100 rounded-2xl p-4 w-28 h-28 flex items-center justify-center shadow-md group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-shield-alt text-6xl text-red-600"></i>
                        </div>
                    </div>

                    <h3 class="text-xl font-extrabold text-gray-900 mb-2">Segurança</h3>
                    <div class="w-12 h-0.5 bg-gradient-to-r from-red-500 to-red-600 mb-3 rounded-full"></div>
                    <p class="text-gray-600 text-sm leading-relaxed">Boas práticas para aplicações mais seguras e proteção de dados.</p>

                    <a href="#" class="mt-4 text-red-600 text-sm font-semibold flex items-center gap-1 group-hover:gap-2 transition-all duration-300">
                        Saiba mais
                        <i class="fas fa-arrow-right text-xs group-hover:translate-x-1 transition-transform duration-300"></i>
                    </a>
                </div>
            </div>

              <div class="text-center pt-12 pb-8 px-4">

        <p class="text-gray-600 max-w-2xl mx-auto text-lg">
            Desenvolvimento de alta performance para impulsionar seu negócio
        </p>
    </div>

            <!-- Botão CTA adicional -->
            <div class="text-center mt-12">
                <a href="#" class="inline-flex items-center gap-2 px-8 py-3 bg-gradient-to-r from-gray-900 to-gray-800 text-white font-semibold rounded-full shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-105 transform">
                    <span>Ver todos os serviços</span>
                    <i class="fas fa-arrow-right text-sm"></i>
                </a>
            </div>
        </div>
    </section>
