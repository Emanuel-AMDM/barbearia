<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    // $fillable — por padrão, o Laravel bloqueia que você faça Usuario::create($request->all()) direto, como proteção contra "mass assignment" (alguém injetar um campo tipo status ou tipo que não devia poder controlar via formulário). Você precisa listar explicitamente quais campos podem ser preenchidos em massa:
    protected $fillable = ['id_usuario', 'cabelo', 'barba', 'cabelo_barba', 'vl_cabelo', 'vl_barba', 'vl_cabelo_barba'];

    // CREATED_AT / UPDATED_AT — como você usou dt_criacao/dt_atualizacao em vez do padrão, precisa avisar o Eloquent:
    const CREATED_AT = 'dt_criacao';
    const UPDATED_AT = 'dt_atualizacao';

    // relação entre os dois Models. Sem ela, hoje você consegue Usuario::create() e Servico::create() separados, mas não consegue fazer $usuario->servicos pra pegar os serviços de um usuário direto, nem $servico->usuario pro caminho contrário.
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }

}
