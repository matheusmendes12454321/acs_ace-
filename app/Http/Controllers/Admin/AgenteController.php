<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AgenteController extends Controller
{
    public function index()
    {
        return view('admin.agentes');
    }
    
    public function lista()
    {
        return view('admin.agentes_lista');
    }
    
    public function store(Request $request)
    {
        // Validação dos dados
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'cpf' => 'required|string|unique:users',
            'rg' => 'required|string',
            'data_nascimento' => 'required|date',
            'telefone' => 'required|string',
            'endereco' => 'required|string',
            'numero' => 'required|string',
            'bairro' => 'required|string',
            'cidade' => 'required|string',
            'uf' => 'required|string|size:2',
            'cep' => 'required|string',
            'funcao' => 'required|string',
            'cargo' => 'required|string',
            'data_admissao' => 'required|date',
            'password' => 'required|min:6|confirmed',
            'foto' => 'nullable|image|max:5120'
        ]);
        
        // Processar foto
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('agentes', 'public');
            $validated['foto_path'] = $fotoPath;
        }
        
        $validated['password'] = bcrypt($validated['password']);
        
        // Aqui será salvo no banco
        // User::create($validated);
        
        return response()->json(['message' => 'Agente cadastrado com sucesso!'], 201);
    }
}
