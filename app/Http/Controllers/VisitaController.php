<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VisitaController extends Controller
{
    private $visitas = [
        ['id' => 1, 'familia' => 'Família Silva', 'agente' => 'Ana Souza', 'data' => '2024-03-15', 'status' => 'realizada', 'tipo' => 'rotina', 'observacoes' => 'Paciente estável'],
        ['id' => 2, 'familia' => 'Família Santos', 'agente' => 'Ricardo Mendonça', 'data' => '2024-03-14', 'status' => 'realizada', 'tipo' => 'emergencia', 'observacoes' => 'Paciente com febre'],
        ['id' => 3, 'familia' => 'Família Oliveira', 'agente' => 'João Batista', 'data' => '2024-03-13', 'status' => 'ausente', 'tipo' => 'rotina', 'observacoes' => 'Morador não encontrado'],
    ];

    public function index()
    {
        return view('admin.visitas', ['visitas' => $this->visitas]);
    }

    public function create()
    {
        return view('admin.visitas_create');
    }

    public function store(Request $request)
    {
        return redirect()->route('visitas.index')->with('success', 'Visita registrada com sucesso!');
    }
}
