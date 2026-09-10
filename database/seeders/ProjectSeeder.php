<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            ['name' => 'Explorador de Quadrinhos Marvel', 'category' => 'Aplicação web com API', 'client' => 'Projeto experimental', 'delivery' => 'Aplicação que consulta e apresenta quadrinhos, personagens e conteúdos do universo Marvel.', 'description' => 'App desenvolvido com integração à API da Marvel para explorar quadrinhos e informações do catálogo em uma interface visual e intuitiva.', 'images' => ['/Capturar1.PNG', '/Capturar2.PNG', '/Capturar3.PNG'], 'technologies' => ['Marvel API', 'Integração', 'Web App']],
            ['name' => 'Plataforma de Música', 'legacy_name' => 'Plataforma de Musica', 'category' => 'Integração com API musical', 'client' => 'Projeto experimental', 'delivery' => 'Site de testes conectado a uma API musical real para consultar e apresentar conteúdos de música.', 'description' => 'Experimento de integração com uma API de música real, reunindo dados musicais em uma experiência moderna e interativa.', 'images' => ['/Capturar4.PNG', '/Capturar5.PNG'], 'technologies' => ['API Musical', 'Integração', 'UX']],
            ['name' => 'Dashboard de Gestão', 'legacy_name' => 'Dashboard de Gestao', 'category' => 'Sistema de gestão', 'client' => 'Operação de serviços', 'delivery' => 'Dashboard centralizado para visualizar informações, acompanhar indicadores e apoiar a gestão da operação.', 'description' => 'Painel administrativo criado para organizar dados e oferecer uma visão clara das informações mais importantes do negócio.', 'images' => ['/image.png'], 'technologies' => ['Dashboard', 'Gestão', 'Interface']],
            ['name' => 'Petly - Marketplace Pet', 'category' => 'Em desenvolvimento - Marketplace', 'client' => 'Plataforma para pet shops', 'delivery' => 'Aplicação multiplataforma para conectar clientes a pet shops, produtos e serviços em um só lugar.', 'description' => 'Marketplace desenvolvido com React Native para mobile e web. A plataforma permitirá que diferentes pet shops se cadastrem, divulguem seus serviços e recebam agendamentos de clientes.', 'images' => ['/pets/WhatsApp Image 2026-08-01 at 16.24.12.jpeg', '/pets/WhatsApp Image 2026-08-01 at 16.24.12 (1).jpeg', '/pets/WhatsApp Image 2026-08-01 at 16.24.13.jpeg', '/pets/WhatsApp Image 2026-08-01 at 16.24.14.jpeg'], 'video_path' => '/pets/Gravação de Tela 2026-08-12 083432.mp4', 'technologies' => ['React Native', 'Mobile/Web', 'Marketplace']],
            ['name' => 'Restaurante Online', 'category' => 'Site gastronômico', 'client' => 'Restaurante', 'delivery' => 'Site de restaurante com cardápio, reservas e identidade visual atraente.', 'description' => 'Projeto de restaurante para apresentar menu, promoções e reservar mesas com experiência visual convidativa.', 'images' => ['/restaurante1.PNG', '/restaurante2.PNG', '/restaurante3.PNG'], 'technologies' => ['Restaurante', 'Cardápio', 'UX']],
            ['name' => 'Jornal Hip Hop', 'category' => 'Portal editorial', 'client' => 'Mídia musical', 'delivery' => 'Site de jornal com conteúdo cultural, notícias e seções para artistas.', 'description' => 'Portal hip hop com matérias, lançamentos e cobertura de cultura urbana com visual moderno.', 'images' => ['/jornal_hiphop.PNG', '/jornal_hiphop2.PNG', '/jornal_hiphop3.PNG'], 'technologies' => ['Jornal', 'Música', 'Cultura']],
            ['name' => 'Pizzaria', 'category' => 'Site gastronômico', 'client' => 'Pizzaria', 'delivery' => 'Site de pizzaria com cardápio, calendário de ofertas e identidade visual atraente.', 'description' => 'Projeto de pizzaria para apresentar menu, promoções e reservar mesas com experiência visual convidativa.', 'images' => ['/pizzaria1.jpeg', '/pizzaria2.jpeg', '/pizzaria3.jpeg', '/pizzaria4.jpeg'], 'technologies' => ['Pizzaria', 'Cardápio', 'UX']],
        ];

        foreach ($projects as $position => $project) {
            $legacyName = $project['legacy_name'] ?? $project['name'];
            unset($project['legacy_name']);

            $model = Project::query()
                ->whereIn('name', array_unique([$project['name'], $legacyName]))
                ->first() ?? new Project;

            $model->fill(array_merge($project, ['status' => 'published', 'sort_order' => $position + 1]))->save();
        }
    }
}
