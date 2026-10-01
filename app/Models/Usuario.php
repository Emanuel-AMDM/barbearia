<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    // Compartilhadas entre RegisterController e GoogleAuthController, pra não
    // duplicar "números soltos" (1, 2) em mais de um lugar.
    public const TIPO_CLIENTE = 1;
    public const TIPO_BARBEIRO = 2;
    public const STATUS_ATIVO = 1;

    // $fillable — por padrão, o Laravel bloqueia que você faça Usuario::create($request->all()) direto, como proteção contra "mass assignment" (alguém injetar um campo tipo status ou tipo que não devia poder controlar via formulário). Você precisa listar explicitamente quais campos podem ser preenchidos em massa:
    protected $fillable = ['tipo', 'nome', 'sobrenome', 'email', 'senha', 'celular', 'dt_aniversario', 'cep', 'rua', 'bairro', 'numero', 'complemento', 'status'];

    // CREATED_AT / UPDATED_AT — como você usou dt_criacao/dt_atualizacao em vez do padrão, precisa avisar o Eloquent:
    const CREATED_AT = 'dt_criacao';
    const UPDATED_AT = 'dt_atualizacao';

    // $hidden — pra senha nunca aparecer sem querer se você algum dia retornar o usuário como JSON (ex: numa API):
    protected $hidden = ['senha'];

    // relação entre os dois Models. Sem ela, hoje você consegue Usuario::create() e Servico::create() separados, mas não consegue fazer $usuario->servicos pra pegar os serviços de um usuário direto, nem $servico->usuario pro caminho contrário.
    public function servicos()
    {
        return $this->hasMany(Servico::class, 'id_usuario');
    }

}
