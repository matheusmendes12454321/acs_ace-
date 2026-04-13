@extends('layouts.master')
@section('title', 'Famílias')
@section('content')
<div class="row g-4 mb-4"><div class="col-md-3"><div class="card-custom text-center"><h2>142</h2><small>Famílias</small></div></div><div class="col-md-3"><div class="card-custom text-center"><h2>8</h2><small>Gestantes</small></div></div><div class="col-md-3"><div class="card-custom text-center"><h2 class="text-danger">12</h2><small>Alto Risco</small></div></div><div class="col-md-3"><div class="card-custom text-center"><h2>24</h2><small>Pendentes</small></div></div></div>
<div class="card-custom"><div class="d-flex justify-content-between mb-4"><input type="text" class="form-control w-50" placeholder="Buscar família..."><button class="btn btn-grad" onclick="showAlert('Nova família')">+ Nova Família</button></div>
<div class="row"><div class="col-md-6"><div class="border rounded-3 p-3 mb-3"><strong>👨‍👩‍👧‍👦 Família Silva</strong><br>Rua das Flores, 123 • 4 integrantes<br><span class="badge bg-success">Em dia</span><button class="btn btn-sm btn-outline-custom mt-2" onclick="showAlert('Ver detalhes')">Ver →</button></div></div>
<div class="col-md-6"><div class="border rounded-3 p-3 mb-3"><strong>👵 Família Santos</strong><br>Av. Central, 456 • 2 integrantes<br><span class="badge bg-warning">Pendente</span><button class="btn btn-sm btn-outline-custom mt-2" onclick="showAlert('Ver detalhes')">Ver →</button></div></div></div></div>
@endsection
