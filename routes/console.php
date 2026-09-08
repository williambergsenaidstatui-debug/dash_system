<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use App\Models\User;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('user:make-admin {email}', function () {
    $user = User::where('email', $this->argument('email'))->first();

    if (! $user) {
        $this->error('Usuário não encontrado. Cadastre a conta primeiro.');

        return 1;
    }

    $user->cargo = 'adm';
    $user->save();
    $this->info('Cargo de administrador atribuído a '.$user->email);

    return 0;
})->purpose('Promover uma conta existente a administrador');
