<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FamiliaController extends Controller
{
    private $familias = [
        ['id' => 1, 'codigo' => 'FAM-001', 'responsavel' => 'José Silva', 'cpf' => '111.111.111-11', 'endereco' => 'Rua das Flores, 123', 'bairro' => 'Centro', 'integrantes' => 4, 'risco' => 'baixo', 'ultima_visita' => '2024-03-15', 'telefone' => '(11) 99999-1111'],
        ['id' => 2, 'codigo' => 'FAM-002', 'responsavel' => 'Maria Santos', 'cpf' => '222.222.222-22', 'endereco' => 'Av. Paulista, 1000', 'bairro' => 'Bela Vista', 'integrantes' => 3, 'risco' => 'medio', 'ultima_visita' => '2024-03-10', 'telefone' => '(11) 99999-2222'],
        ['id' => 3, 'codigo' => 'FAM-003', 'responsavel' => 'Antonio Oliveira', 'cpf' => '333.333.333-33', 'endereco' => 'Rua da Paz, 45', 'bairro' => 'Vila Mariana', 'integrantes' => 5, 'risco' => 'alto', 'ultima_visita' => '2024-03-05', 'telefone' => '(11) 99999-3333'],
    ];

    public function index()
    {
        return view('admin.familias', ['familias' => $this->familias]);
    }

    public function create()
    {
        return view('admin.familias_create');
    }

    public function store(Request $request)
    {
        return redirect()->route('familias.index')->with('success', 'Família cadastrada com sucesso!');
    }

    public function show($id)
    {
        $familia = collect($this->familias)->firstWhere('id', $id);
        return view('admin.familias_show', compact('familia'));
    }

    public function edit($id)
    {
        $familia = collect($this->familias)->firstWhere('id', $id);
        return view('admin.familias_edit', compact('familia'));
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('familias.index')->with('success', 'Família atualizada!');
    }

    public function destroy($id)
    {
        return redirect()->route('familias.index')->with('success', 'Família removida!');
    }
}
