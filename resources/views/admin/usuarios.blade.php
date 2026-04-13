@extends('layouts.master')
@section('title', 'Gestão de Usuários')
@section('content')
<div class="card-custom">
	<div class="d-flex justify-content-between mb-4"><h4>Usuários do Sistema</h4><button class="btn btn-grad" onclick="showAlert('Novo usuário')">+ Novo</button></div>
	<div class="table-responsive"><table class="table-custom"><thead><tr><th>Nome</th><th>Email</th><th>Função</th><th>Status</th><th>Ações</th></tr></thead>
	<tbody><tr><td><strong>Ricardo Mendonça</strong></td><td>ricardo@saude.gov</td><td><span class="badge bg-primary">Supervisor</span></td><td><span class="badge bg-success">Ativo</span></td><td><button class="btn btn-sm btn-light" onclick="showAlert('Editar')">✏️</button></td></tr>
	<tr><td><strong>Ana Souza Lima</strong></td><td>ana@saude.gov</td><td><span class="badge bg-info">ACS</span></td><td><span class="badge bg-success">Ativo</span></td><td><button class="btn btn-sm btn-light" onclick="showAlert('Editar')">✏️</button></td></tr>
	<tr><td><strong>João Batista</strong></td><td>joao@saude.gov</td><td><span class="badge bg-warning">ACE</span></td><td><span class="badge bg-danger">Bloqueado</span></td><td><button class="btn btn-sm btn-light" onclick="showAlert('Editar')">✏️</button></td></tr>
	</tbody></table></div>
</div>
@endsection
