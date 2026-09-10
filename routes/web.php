<?php

use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\ProfileController;
use App\Models\Project;
use Illuminate\Support\Facades\Route;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

$buildSitemap = function (): Sitemap {
    $appUrl = rtrim(config('app.url'), '/');

    $sitemap = app()->bound(Sitemap::class) ? app(Sitemap::class) : Sitemap::create();

    return $sitemap
        ->add(Url::create($appUrl))
        ->add(Url::create($appUrl.'/portifolio'))
        ->add(Url::create($appUrl.'/projetos'))
        ->add(Url::create($appUrl.'/sobre'))
        ->add(Url::create($appUrl.'/servicos'))
        ->add(Url::create($appUrl.'/contato'))
        ->add(Url::create($appUrl.'/diagnostico'));
};

Route::get('/', function () {
    return view('inicio');
})->name('inicio');

Route::get('/portifolio', function () {
    return view('portifolio');
})->name('portfolio');

Route::get('/projetos', function () {
    return view('projetos', [
        'projects' => Project::published()->orderBy('sort_order')->orderByDesc('updated_at')->get(),
    ]);
})->name('projetos');

Route::get('/sobre', function () {
    return view('sobre');
})->name('sobre');

Route::get('/servicos', function () {
    return view('servicos');
})->name('servicos');

Route::get('/contato', function () {
    return view('contato');
})->name('contato');

Route::post('/contato', [ContatoController::class, 'enviar'])->name('contato.enviar');

Route::get('/diagnostico', function () {
    return view('diagnostico');
})->name('diagnostico');

Route::get('/inicio', function () {
    return view('inicio');
})->name('inicio.alias');

Route::middleware(['auth', 'can:access-dashboard'])->group(function () {
    Route::get('/dashboard', [ProjectController::class, 'index'])->name('dashboard');
    Route::resource('admin/projects', ProjectController::class)
        ->except(['index', 'show'])
        ->names('admin.projects');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/sitemap.xml', function () use ($buildSitemap) {
    return $buildSitemap();
})->name('sitemap');

Route::get('/gerar-sitemap', function () use ($buildSitemap) {
    $buildSitemap()->writeToFile(public_path('sitemap.xml'));

    return 'Sitemap gerado com sucesso em /sitemap.xml!';
})->middleware(['auth', 'can:access-dashboard']);

require __DIR__.'/auth.php';
