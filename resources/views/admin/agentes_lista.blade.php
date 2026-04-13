@extends('layouts.master')

@section('title', 'Lista de Agentes')

@section('content')
<div class="card-custom">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold mb-0"><i class="fas fa-users me-2"></i>Agentes Cadastrados</h4>
        <button class="btn btn-grad" onclick="window.location.href='{{ route('admin.agentes') }}'">
            <i class="fas fa-plus me-2"></i>Novo Agente
        </button>
    </div>
    
    <div class="table-responsive-custom">
        <table class="table-custom w-100">
            <thead>
                <tr><th>Foto</th><th>Nome</th><th>CPF</th><th>Função</th><th>Microárea</th><th>Status</th><th>Ações</th>
                </thead>
            <tbody id="agentesList">
                <tr><td colspan="7" class="text-center py-4">Nenhum agente cadastrado. Clique em "Novo Agente" para começar.</td></tr>
            </tbody>
        </table>
    </div>
</div>

<script>
    // Simulação de dados - depois conecta com o back
    function carregarAgentes() {
        // Aqui virá a requisição AJAX para o backend
        console.log('Carregando agentes...');
    }
    carregarAgentes();
</script>
@endsection
