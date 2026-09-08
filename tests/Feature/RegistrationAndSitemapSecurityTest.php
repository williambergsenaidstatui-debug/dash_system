<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Sitemap\Sitemap;
use Tests\TestCase;

class RegistrationAndSitemapSecurityTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_is_limited_to_ten_attempts_per_minute_per_ip(): void
    {
        for ($attempt = 0; $attempt < 10; $attempt++) {
            $this->postJson('/register', [])->assertUnprocessable();
        }

        $this->postJson('/register', [])->assertStatus(429)->assertHeader('Retry-After');
        $this->withServerVariables(['REMOTE_ADDR' => '192.0.2.10'])
            ->postJson('/register', [])->assertUnprocessable();

        $this->travel(61)->seconds();
        $this->withServerVariables(['REMOTE_ADDR' => '127.0.0.1'])
            ->postJson('/register', [])->assertUnprocessable();
    }

    public function test_guests_cannot_generate_sitemap(): void
    {
        $this->get('/gerar-sitemap')->assertRedirect('/login');
    }

    public function test_regular_users_cannot_generate_sitemap(): void
    {
        $this->actingAs(User::factory()->create())
            ->get('/gerar-sitemap')->assertForbidden();
    }

    public function test_admin_can_generate_sitemap(): void
    {
        $sitemap = \Mockery::mock(Sitemap::class)->makePartial();
        $sitemap->shouldReceive('writeToFile')->once()
            ->with(public_path('sitemap.xml'))->andReturnSelf();
        $this->app->instance(Sitemap::class, $sitemap);

        $this->actingAs(User::factory()->create(['cargo' => 'adm']))
            ->get('/gerar-sitemap')->assertOk()->assertSee('Sitemap gerado com sucesso');
    }

    public function test_public_sitemap_remains_accessible(): void
    {
        $this->get('/sitemap.xml')->assertOk();
    }
}
