<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminDashboardTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_must_login(): void
    {
        $this->get('/dashboard')->assertRedirect('/login');
    }

    public function test_regular_user_cannot_access_dashboard(): void
    {
        $this->actingAs(User::factory()->create())->get('/dashboard')->assertForbidden();
    }

    public function test_admin_can_login_and_access_dashboard(): void
    {
        $user = User::factory()->create(['cargo' => 'adm']);
        $this->post('/login', ['email' => $user->email, 'password' => 'password'])
            ->assertRedirect('/dashboard');
        $this->get('/dashboard')->assertOk()->assertSee('Dashboard administrativo');
    }

    public function test_registration_cannot_grant_admin_role(): void
    {
        $this->post('/register', [
            'name' => 'Test', 'email' => 'test@example.com',
            'password' => 'password', 'password_confirmation' => 'password',
            'cargo' => 'adm',
        ])->assertRedirect(route('profile.edit'));
        $this->assertDatabaseHas('users', ['email' => 'test@example.com', 'cargo' => 'usuario']);
        $this->get('/dashboard')->assertForbidden();
    }

    public function test_regular_login_does_not_redirect_to_intended_dashboard(): void
    {
        $user = User::factory()->create();
        $this->get('/dashboard')->assertRedirect('/login');
        $this->post('/login', ['email' => $user->email, 'password' => 'password'])
            ->assertRedirect(route('profile.edit'));
    }

    public function test_command_promotes_existing_user(): void
    {
        $user = User::factory()->create();
        $this->artisan('user:make-admin', ['email' => $user->email])->assertSuccessful();
        $this->assertSame('adm', $user->fresh()->cargo);
    }

    public function test_command_rejects_unknown_user(): void
    {
        $this->artisan('user:make-admin', ['email' => 'missing@example.com'])->assertFailed();
    }
}
