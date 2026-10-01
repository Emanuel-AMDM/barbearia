<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    /**
     * Chamado quando a pessoa clica em "Continuar com o Google" — redireciona
     * pro Google escolher a conta e autorizar o acesso.
     */
    public function redirect(Request $request)
    {
        // O botão de cada aba manda ?tipo=cliente ou ?tipo=barbeiro.
        $tipo = $request->query('tipo') === 'barbeiro'
            ? Usuario::TIPO_BARBEIRO
            : Usuario::TIPO_CLIENTE;

        session(['cadastro_google_tipo' => $tipo]);

        return Socialite::driver('google')
            ->stateless()
            ->with(['state' => $tipo])
            ->redirect();
    }

    /**
     * O Google chama essa rota de volta depois que a pessoa autoriza.
     */
    public function callback(Request $request)
    {
        $googleUser = Socialite::driver('google')->stateless()->user();

        // Recupera o tipo ou via state retornado pelo Google ou da sessão (fallback)
        $stateTipo = $request->input('state');
        $tipo = in_array($stateTipo, [Usuario::TIPO_BARBEIRO, Usuario::TIPO_CLIENTE])
            ? $stateTipo
            : session('cadastro_google_tipo', Usuario::TIPO_CLIENTE);

        // firstOrCreate: se já existe um usuário com esse e-mail, reaproveita
        // (funciona como "login"); se não existe, cria na hora (o "registrar").
        $usuario = Usuario::firstOrCreate(
            ['email' => $googleUser->getEmail()],
            [
                'tipo' => $tipo,
                'nome' => $this->primeiroNome($googleUser->getName()),
                'sobrenome' => $this->sobrenome($googleUser->getName()),
                // Quem entra pelo Google nunca vai digitar uma senha aqui —
                // gero uma aleatória só pra satisfazer a coluna NOT NULL.
                // Essa pessoa só consegue entrar de novo pelo próprio Google.
                'senha' => Hash::make(Str::random(32)),
                'status' => Usuario::STATUS_ATIVO,
            ]
        );

        return redirect()->route('login')->with(
            'sucesso',
            'Cadastro/login com Google realizado com sucesso! Bem-vindo, ' . $usuario->nome . '.'
        );
    }

    private function primeiroNome(string $nomeCompleto): string
    {
        // Str::limit corta em 20 caracteres — mesmo limite da coluna
        // "nome" no banco (string(20) na migration), pra não estourar.
        return Str::limit(trim(strtok($nomeCompleto, ' ')), 20, '');
    }

    private function sobrenome(string $nomeCompleto): string
    {
        $partes = explode(' ', trim($nomeCompleto), 2);
        return Str::limit($partes[1] ?? '', 20, '');
    }
}
