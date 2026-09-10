<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProjectController extends Controller
{
    public function index(): View
    {
        return view('dashboard', [
            'projects' => Project::query()->orderBy('sort_order')->orderByDesc('updated_at')->get(),
        ]);
    }

    public function create(): View
    {
        return view('admin.projects.create');
    }

    public function store(ProjectRequest $request): RedirectResponse
    {
        Project::create($this->projectData($request));

        return redirect()->route('dashboard')->with('status', 'Projeto criado com sucesso.');
    }

    public function edit(Project $project): View
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(ProjectRequest $request, Project $project): RedirectResponse
    {
        $project->update($this->projectData($request, $project));

        return redirect()->route('dashboard')->with('status', 'Projeto atualizado com sucesso.');
    }

    public function destroy(Project $project): RedirectResponse
    {
        $this->deleteManagedFiles($project->images ?? []);
        $this->deleteManagedFiles([$project->video_path]);
        $project->delete();

        return redirect()->route('dashboard')->with('status', 'Projeto excluído.');
    }

    private function projectData(ProjectRequest $request, ?Project $project = null): array
    {
        $validated = $request->validated();
        $existingImages = $project?->images ?? [];
        $removedImages = array_intersect($existingImages, $validated['remove_images'] ?? []);
        $this->deleteManagedFiles($removedImages);

        $images = array_values(array_diff($existingImages, $removedImages));
        foreach ($request->file('images', []) as $image) {
            $images[] = '/storage/'.$image->store('projects/images', 'public');
        }

        $videoPath = $project?->video_path;
        if ($request->boolean('remove_video') || $request->hasFile('video')) {
            $this->deleteManagedFiles([$videoPath]);
            $videoPath = null;
        }
        if ($request->hasFile('video')) {
            $videoPath = '/storage/'.$request->file('video')->store('projects/videos', 'public');
        }

        return [
            'name' => $validated['name'],
            'category' => $validated['category'],
            'client' => $validated['client'] ?? null,
            'delivery' => $validated['delivery'] ?? null,
            'description' => $validated['description'],
            'link' => $validated['link'] ?? null,
            'technologies' => collect(explode(',', $validated['technologies'] ?? ''))
                ->map(fn (string $technology) => trim($technology))
                ->filter()
                ->unique()
                ->values()
                ->all(),
            'images' => $images,
            'video_path' => $videoPath,
            'status' => $validated['status'],
            'sort_order' => $validated['sort_order'],
        ];
    }

    private function deleteManagedFiles(array $paths): void
    {
        foreach (array_filter($paths) as $path) {
            if (str_starts_with($path, '/storage/projects/')) {
                Storage::disk('public')->delete(str_replace('/storage/', '', $path));
            }
        }
    }
}
