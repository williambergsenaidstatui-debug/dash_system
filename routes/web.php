<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('inicio');
})->name('inicio');

Route::get('/portifolio', function () {
    return view('portifolio');
})->name('portfolio');

Route::get('/projetos', function () {
    return view('projetos');
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

Route::get('/diagnostico', function () {
    return view('diagnostico');
})->name('diagnostico');



Route::get('/inicio', function () {
    return view('inicio');
})->name('inicio.alias');

Route::get('/dashboard', function () {
    return view('dashboard');


})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
