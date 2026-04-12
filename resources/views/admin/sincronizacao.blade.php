@extends('layouts.master')

@section('title', 'Sincronização e-SUS')

@section('content')
<div class="row g-3 g-md-4">
    <div class="col-md-5"><div class="card-custom text-center"><i class="fas fa-cloud-upload-alt fa-3x text-primary mb-3"></i><h3>12 Registros</h3><p>320kb aguardando</p><button class="btn btn-grad w-100" onclick="syncNow()">Sincronizar</button><div class="mt-3"><small>Modo Offline: <strong class="text-success">Ativo</strong></small></div></div></div>
    <div class="col-md-7"><div class="card-custom"><h5>Últimas Sincronizações</h5><div class="d-flex justify-content-between py-2 border-bottom flex-wrap"><span>✅ Hoje, 08:12</span><span>42 registros</span></div><div class="d-flex justify-content-between py-2 border-bottom flex-wrap"><span>✅ Ontem, 17:45</span><span>156 registros</span></div></div></div>
</div>
<div class="row mt-4"><div class="col-12"><div class="card-custom"><h5>Formulários Pendentes</h5><div class="list-group"><div class="list-group-item d-flex justify-content-between align-items-center"><span><i class="fas fa-file-alt text-primary me-2"></i>Cadastro de Família - Rua das Flores</span><span class="badge bg-warning">10:45</span></div><div class="list-group-item d-flex justify-content-between align-items-center"><span><i class="fas fa-notes-medical text-success me-2"></i>Visita Domiciliar - Maria Silva</span><span class="badge bg-warning">11:20</span></div></div></div></div></div>
@endsection
