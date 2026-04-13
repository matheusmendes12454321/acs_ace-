@extends('layouts.master')
@section('title', 'Cadastrar Agente')
@section('content')
<div class="card-custom">
	<h4>Cadastrar Novo Agente</h4>
	<form method="POST" action="{{ route('admin.agentes.store') }}">@csrf
    	<div class="row g-3 mt-2">
        	<div class="col-md-6"><label>Nome Completo *</label><input type="text" class="form-control" required></div>
        	<div class="col-md-6"><label>Email *</label><input type="email" class="form-control" required></div>
        	<div class="col-md-4"><label>CPF *</label><input type="text" class="form-control" required></div>
        	<div class="col-md-4"><label>RG *</label><input type="text" class="form-control" required></div>
        	<div class="col-md-4"><label>Data Nascimento *</label><input type="date" class="form-control" required></div>
        	<div class="col-md-6"><label>Telefone *</label><input type="text" class="form-control" required></div>
        	<div class="col-md-6"><label>Função *</label><select class="form-select"><option>ACS</option><option>ACE</option></select></div>
        	<div class="col-md-8"><label>Endereço *</label><input type="text" class="form-control" required></div>
        	<div class="col-md-4"><label>Número *</label><input type="text" class="form-control" required></div>
        	<div class="col-md-6"><label>Bairro *</label><input type="text" class="form-control" required></div>
        	<div class="col-md-6"><label>CEP *</label><input type="text" class="form-control" required></div>
        	<div class="col-md-6"><label>Senha *</label><input type="password" class="form-control" required></div>
        	<div class="col-md-6"><label>Confirmar Senha *</label><input type="password" class="form-control" required></div>
    	</div>
    	<div class="mt-4"><button type="submit" class="btn btn-grad">Cadastrar</button><a href="{{ route('admin.agentes.lista') }}" class="btn btn-outline-custom ms-2">Cancelar</a></div>
	</form>
</div>
@endsection
