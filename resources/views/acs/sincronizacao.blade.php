@extends('layouts.master')
@section('title', 'Sincronização')
@section('content')
<div class="row"><div class="col-md-5"><div class="card-custom text-center"><i class="fas fa-cloud-upload-alt fa-3x text-primary mb-3"></i><h3>12 Registros</h3><p>320kb pendentes</p><button class="btn btn-grad w-100" onclick="showAlert('Sincronizando...')">Sincronizar Agora</button><div class="mt-2"><small>Modo Offline: <strong class="text-success">Ativo</strong></small></div></div></div>
<div class="col-md-7"><div class="card-custom"><h5>Formulários Pendentes</h5><div class="list-group"><div class="list-group-item d-flex justify-content-between"><span>📄 Cadastro Família - Rua das Flores</span><span class="badge bg-warning">10:45</span></div><div class="list-group-item d-flex justify-content-between"><span>📋 Visita Domiciliar - Maria Silva</span><span class="badge bg-warning">11:20</span></div></div></div></div></div>
@endsection
