<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgenteController extends Controller
{
    private $agentes = [
        ['id' => 1, 'nome' => 'Ricardo Mendonça', 'email' => 'ricardo.m@saude.gov.br', 'cpf' => '123.456.789-00', 'funcao' => 'supervisor', 'status' => 'ativo', 'telefone' => '(11) 99999-1111', 'endereco' => 'Rua A, 123', 'bairro' => 'Centro', 'data_admissao' => '2023-01-15'],
        ['id' => 2, 'nome' => 'Ana Souza Lima', 'email' => 'ana.lima@saude.gov.br', 'cpf' => '234.567.890-11', 'funcao' => 'acs', 'status' => 'ativo', 'telefone' => '(11) 99999-2222', 'endereco' => 'Rua B, 456', 'bairro' => 'Vila Mariana', 'data_admissao' => '2023-03-20'],
        ['id' => 3, 'nome' => 'João Batista', 'email' => 'j.batista@saude.gov.br', 'cpf' => '345.678.901-22', 'funcao' => 'ace', 'status' => 'ativo', 'telefone' => '(11) 99999-3333', 'endereco' => 'Rua C, 789', 'bairro' => 'Saúde', 'data_admissao' => '2023-06-10'],
    ];

    public function index()
    {
        return view('admin.agentes_lista', ['agentes' => $this->agentes]);
    }

    public function create()
    {
        return view('admin.agentes');
    }

    public function store(Request $request)
    {
        return redirect()->route('admin.agentes.lista')->with('success', 'Agente cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $agente = collect($this->agentes)->firstWhere('id', $id);
        return view('admin.agentes_edit', compact('agente'));
    }

    public function destroy($id)
    {
        return redirect()->route('admin.agentes.lista')->with('success', 'Agente removido!');
    }
}
