<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContatoController extends Controller
{
    public function enviar(Request $request)
    {
        $dados = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:120'],
            'subject' => ['required', 'string', 'max:150'],
            'message' => ['required', 'string', 'max:3000'],
        ]);

        Mail::raw(
            "Nome: {$dados['name']}\n" .
            "E-mail: {$dados['email']}\n" .
            "Assunto: {$dados['subject']}\n\n" .
            "Mensagem:\n{$dados['message']}",
            function ($message) use ($dados) {
                $message->to(env('CONTACT_MAIL_TO', 'dashbrasilds@gmail.com'))
                    ->subject('Novo contato pelo site: ' . $dados['subject'])
                    ->replyTo($dados['email'], $dados['name']);
            }
        );

        return back()->with('success', 'Mensagem enviada com sucesso!');
    }
}