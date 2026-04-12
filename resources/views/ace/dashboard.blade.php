@extends('layouts.master')

@section('title', 'Dashboard de Endemias')

@section('content')
<div class="row g-3 g-md-4 mb-4">
    <div class="col-4"><div class="card-custom text-center"><h2 class="text-danger">124</h2><small>Focos</small></div></div>
    <div class="col-4"><div class="card-custom text-center"><h2>48</h2><small>Vistorias</small></div></div>
    <div class="col-4"><div class="card-custom text-center"><h2 class="text-warning">8</h2><small>Alto Risco</small></div></div>
</div>
<div class="card-custom mb-3" style="background: linear-gradient(135deg, #dc2626, #b91c1c); color:white;"><h5>🚨 ALERTA: Foco Crítico</h5><p class="small">Rua das Palmeiras, 452</p><button class="btn btn-light btn-sm" onclick="delegateIntervention()">Intervir</button></div>
<div class="row g-3 g-md-4"><div class="col-md-6"><div class="card-custom"><h5>Evidências</h5><div class="d-flex gap-2 flex-wrap"><span class="badge bg-danger">Foco #843</span><span class="badge bg-secondary">Foco #842</span></div></div></div><div class="col-md-6"><div class="card-custom"><h5>Ações</h5><button class="btn btn-grad w-100 mb-2" onclick="alert('Alocar')">Alocar Equipe</button><button class="btn btn-outline-custom w-100" onclick="alert('Nova ordem')">Nova Ordem</button></div></div></div>
@endsection
