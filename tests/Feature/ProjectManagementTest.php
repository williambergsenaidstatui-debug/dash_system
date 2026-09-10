<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ProjectManagementTest extends TestCase
{
    use RefreshDatabase;

    public function test_only_admin_can_open_project_management(): void
    {
        $project = Project::factory()->create();

        $this->get(route('admin.projects.create'))->assertRedirect('/login');
        $this->actingAs(User::factory()->create())
            ->get(route('admin.projects.edit', $project))
            ->assertForbidden();
    }

    public function test_admin_can_create_project_with_media(): void
    {
        Storage::fake('public');
        $admin = User::factory()->create(['cargo' => 'adm']);

        $response = $this->actingAs($admin)->post(route('admin.projects.store'), [
            'name' => 'Sistema Comercial',
            'category' => 'Sistema de gestao',
            'client' => 'Cliente teste',
            'delivery' => 'Painel e automacoes.',
            'description' => 'Projeto completo para organizar a operacao comercial.',
            'link' => 'https://example.com/projeto',
            'technologies' => 'Laravel, MySQL, Laravel',
            'status' => 'published',
            'sort_order' => 2,
            'images' => [UploadedFile::fake()->createWithContent(
                'capa.png',
                base64_decode('iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNk+A8AAQUBAScY42YAAAAASUVORK5CYII=')
            )],
            'video' => UploadedFile::fake()->create('demo.mp4', 500, 'video/mp4'),
        ]);

        $response->assertRedirect(route('dashboard'));
        $project = Project::where('name', 'Sistema Comercial')->firstOrFail();

        $this->assertSame(['Laravel', 'MySQL'], $project->technologies);
        $this->assertSame('published', $project->status);
        Storage::disk('public')->assertExists(str_replace('/storage/', '', $project->images[0]));
        Storage::disk('public')->assertExists(str_replace('/storage/', '', $project->video_path));
    }

    public function test_admin_can_update_and_delete_project_and_managed_files(): void
    {
        Storage::fake('public');
        Storage::disk('public')->put('projects/images/old.jpg', 'image');
        $admin = User::factory()->create(['cargo' => 'adm']);
        $project = Project::factory()->create([
            'images' => ['/storage/projects/images/old.jpg'],
        ]);

        $this->actingAs($admin)->put(route('admin.projects.update', $project), [
            'name' => 'Projeto atualizado',
            'category' => $project->category,
            'description' => $project->description,
            'technologies' => 'PHP, JavaScript',
            'status' => 'published',
            'sort_order' => 1,
            'remove_images' => ['/storage/projects/images/old.jpg'],
        ])->assertRedirect(route('dashboard'));

        $project->refresh();
        $this->assertSame([], $project->images);
        Storage::disk('public')->assertMissing('projects/images/old.jpg');

        $this->actingAs($admin)
            ->delete(route('admin.projects.destroy', $project))
            ->assertRedirect(route('dashboard'));
        $this->assertModelMissing($project);
    }

    public function test_public_portfolio_only_contains_published_projects(): void
    {
        Project::factory()->published()->create(['name' => 'Projeto visivel']);
        Project::factory()->create(['name' => 'Projeto secreto']);

        $this->get(route('projetos'))
            ->assertOk()
            ->assertSee('Projeto visivel')
            ->assertDontSee('Projeto secreto');
    }

    public function test_project_fields_are_validated(): void
    {
        $admin = User::factory()->create(['cargo' => 'adm']);

        $this->actingAs($admin)->post(route('admin.projects.store'), [
            'name' => '',
            'category' => '',
            'description' => '',
            'link' => 'javascript:alert(1)',
            'status' => 'invalid',
            'sort_order' => -1,
        ])->assertSessionHasErrors(['name', 'category', 'description', 'link', 'status', 'sort_order']);

        $this->assertDatabaseCount('projects', 0);
    }
}
