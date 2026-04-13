@extends('layouts.master')
@section('title', 'Lista de Agentes')
@section('content')
<div class="card-custom">
	<div class="d-flex justify-content-between mb-4"><h4>Agentes de Saúde</h4><a href="{{ route('admin.agentes') }}" class="btn btn-grad">+ Novo Agente</a></div>
	<div class="table-responsive"><table class="table-custom"><thead><tr><th>Nome</th><th>CPF</th><th>Função</th><th>Status</th><th>Ações</th></tr></thead>
	<tbody><tr><td><strong>Maria Silva</strong></td><td>123.456.789-00</td><td><span class="badge bg-info">ACS</span></td><td><span class="badge bg-success">Ativo</span></td><td><button class="btn btn-sm btn-light" onclick="showAlert('Editar')">✏️</button></td></tr>
	<tr><td><strong>Carlos Santos</strong></td><td>234.567.890-11</td><td><span class="badge bg-warning">ACE</span></td><td><span class="badge bg-success">Ativo</span></td><td><button class="btn btn-sm btn-light" onclick="showAlert('Editar')">✏️</button></td></tr>
	</tbody></table></div>
</div>
@endsection
