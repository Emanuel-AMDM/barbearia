<?php

namespace App\Http\Controllers;

use App\Models\Servico;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Recebe o POST da aba "Cliente" (form action="registerClient").
     * Form mais simples: sem endereço e sem serviços.
     */
    public function storeClient(Request $request)
    {
        // 1) Validação. Se alguma regra falhar, o Laravel interrompe aqui,
        // redireciona de volta pro formulário com os erros (acessíveis via
        // @error('campo') no Blade) e o resto do método nem executa.
        $dados = $request->validate([
            'nome' => 'required|string|max:20',
            'sobrenome' => 'required|string|max:20',
            // unique:usuarios,email consulta o banco antes de inserir,
            // pra dar um erro amigável em vez de estourar no INSERT.
            'email' => 'required|email|max:50|unique:usuarios,email',
            // "confirmed" já procura sozinho por um campo "senha_confirmation"
            // e verifica se os dois batem — é esse o nome que o form usa agora.
            'senha' => 'required|min:6|confirmed',
            'telefone' => 'nullable|string|max:20',
            'dt_aniversario' => 'nullable|date',
        ]);

        // 2) Nunca salvar senha em texto puro.
        $senhaHash = Hash::make($dados['senha']);

        // 3) Cria o registro. Os nomes de coluna do banco (ex: "celular")
        // são diferentes dos names do form (ex: "telefone") — o mapeamento
        // é feito aqui na hora de montar o array.
        Usuario::create([
            'tipo' => Usuario::TIPO_CLIENTE,
            'nome' => $dados['nome'],
            'sobrenome' => $dados['sobrenome'],
            'email' => $dados['email'],
            'senha' => $senhaHash,
            'celular' => $dados['telefone'] ?? null,
            'dt_aniversario' => $dados['dt_aniversario'] ?? null,
            'status' => Usuario::STATUS_ATIVO,
        ]);

        // 4) Redireciona pro login com uma mensagem de sucesso (flash session,
        // some sozinha depois do próximo request).
        return redirect()->route('login')->with('sucesso', 'Cadastro realizado com sucesso!');
    }

    /**
     * Recebe o POST da aba "Barbeiro" (form action="registerBarber").
     * Além dos dados básicos, tem endereço e os serviços oferecidos.
     */
    public function storeBarber(Request $request)
    {
        $dados = $request->validate([
            'nome' => 'required|string|max:20',
            'sobrenome' => 'required|string|max:20',
            'email' => 'required|email|max:50|unique:usuarios,email',
            'senha' => 'required|min:6|confirmed',
            'telefone' => 'required|string|max:20',
            'dt_aniversario' => 'nullable|date',
            'cep' => 'required|string|max:10',
            'rua' => 'required|string|max:50',
            'bairro' => 'required|string|max:50',
            'numero' => 'required|string|max:10',
            'complemento' => 'nullable|string|max:100',
            // O bloco de serviços é opcional e vem aninhado, ex:
            // servicos[cabelo][ativo] = "on", servicos[cabelo][valor] = "40.00".
            'servicos' => 'nullable|array',
        ]);

        $senhaHash = Hash::make($dados['senha']);

        $usuario = Usuario::create([
            'tipo' => Usuario::TIPO_BARBEIRO,
            'nome' => $dados['nome'],
            'sobrenome' => $dados['sobrenome'],
            'email' => $dados['email'],
            'senha' => $senhaHash,
            'celular' => $dados['telefone'],
            'dt_aniversario' => $dados['dt_aniversario'] ?? null,
            'cep' => $dados['cep'],
            'rua' => $dados['rua'],
            'bairro' => $dados['bairro'],
            'numero' => $dados['numero'],
            'complemento' => $dados['complemento'] ?? null,
            'status' => Usuario::STATUS_ATIVO,
        ]);

        // Pego o array bruto de serviços (não passa por $request->validate()
        // porque não validamos o conteúdo interno, só que é um array).
        $servicos = $request->input('servicos', []);

        // Um único registro em "servicos" guarda os 3 tipos pro barbeiro,
        // igual ao seu diagrama (colunas cabelo/barba/cabelo_barba).
        // isset(...['ativo']) vira true só quando o checkbox foi marcado —
        // checkbox desmarcado não é enviado no POST, então a chave nem existe.
        Servico::create([
            'id_usuario' => $usuario->id,
            'cabelo' => isset($servicos['cabelo']['ativo']),
            'barba' => isset($servicos['barba']['ativo']),
            'cabelo_barba' => isset($servicos['cabelo_barba']['ativo']),
            'vl_cabelo' => $servicos['cabelo']['valor'] ?? null,
            'vl_barba' => $servicos['barba']['valor'] ?? null,
            'vl_cabelo_barba' => $servicos['cabelo_barba']['valor'] ?? null,
        ]);

        return redirect()->route('login')->with('sucesso', 'Cadastro realizado com sucesso!');
    }
}
