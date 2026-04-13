<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FocoController extends Controller
{
    private $focos = [
        ['id' => 1, 'codigo' => 'FOCO-001', 'endereco' => 'Rua das Palmeiras, 452', 'bairro' => 'Vila Mariana', 'tipo' => 'dengue', 'risco' => 'critico', 'status' => 'identificado', 'data' => '2024-03-15'],
        ['id' => 2, 'codigo' => 'FOCO-002', 'endereco' => 'Av. Central, 1205', 'bairro' => 'Centro', 'tipo' => 'zika', 'risco' => 'medio', 'status' => 'em_tratamento', 'data' => '2024-03-10'],
        ['id' => 3, 'codigo' => 'FOCO-003', 'endereco' => 'Travessa da Paz, 12', 'bairro' => 'Saúde', 'tipo' => 'chikungunya', 'risco' => 'alto', 'status' => 'monitorado', 'data' => '2024-03-05'],
    ];

    public function index()
    {
        return view('admin.focos', ['focos' => $this->focos]);
    }

    public function create()
    {
        return view('admin.focos_create');
    }

    public function store(Request $request)
    {
        return redirect()->route('focos.index')->with('success', 'Foco cadastrado com sucesso!');
    }

    public function show($id)
    {
        $foco = collect($this->focos)->firstWhere('id', $id);
        return view('admin.focos_show', compact('foco'));
    }

    public function edit($id)
    {
        $foco = collect($this->focos)->firstWhere('id', $id);
        return view('admin.focos_edit', compact('foco'));
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('focos.index')->with('success', 'Foco atualizado!');
    }

    public function destroy($id)
    {
        return redirect()->route('focos.index')->with('success', 'Foco removido!');
    }
}
