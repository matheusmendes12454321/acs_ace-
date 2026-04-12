@extends('layouts.master')

@section('title', 'Monitoramento de Endemias')

@section('content')
<div class="row g-3 g-md-4 mb-4">
    <div class="col-6 col-md-3"><div class="card-custom text-center"><h2 class="fw-bold text-danger">124</h2><small>Casos Ativos</small></div></div>
    <div class="col-6 col-md-3"><div class="card-custom text-center"><h2 class="fw-bold text-info">48</h2><small>Visitas Hoje</small></div></div>
    <div class="col-6 col-md-3"><div class="card-custom text-center"><h2 class="fw-bold text-warning">8</h2><small>Focos Críticos</small></div></div>
    <div class="col-6 col-md-3"><div class="card-custom text-center"><h2 class="fw-bold text-success">92%</h2><small>Cobertura</small></div></div>
</div>
<div class="row g-3 g-md-4">
    <div class="col-md-7"><div class="card-custom"><h5>Focos por Região</h5><div class="mb-3"><div class="d-flex justify-content-between"><span>Setor Norte</span><span>75%</span></div><div class="progress-custom mt-1"><div class="progress-bar bg-danger" style="width:75%"></div></div></div><div class="mb-3"><div class="d-flex justify-content-between"><span>Setor Sul</span><span>45%</span></div><div class="progress-custom mt-1"><div class="progress-bar bg-warning" style="width:45%"></div></div></div></div></div>
    <div class="col-md-5"><div class="card-custom" style="background: linear-gradient(135deg, #00426d, #005a92); color:white;"><h5><i class="fas fa-map-marker-alt me-2"></i>Alerta Vermelho</h5><p class="mb-1 small"><strong>ID: #88291-BA</strong></p><p class="small">Rua das Palmeiras, 452 - Setor Sul</p><button class="btn btn-light btn-sm mt-2 w-100" onclick="delegateIntervention()">Delegar Intervenção</button></div></div>
</div>
@endsection
