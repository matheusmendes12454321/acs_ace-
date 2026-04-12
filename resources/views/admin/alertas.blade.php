@extends('layouts.master')

@section('title', 'Central de Alertas')

@section('content')
<div class="row g-3 g-md-4 mb-4">
    <div class="col-6 col-md-3"><div class="card-custom text-center"><h2 class="fw-bold text-danger">12</h2><small>Urgência Alta</small></div></div>
    <div class="col-6 col-md-3"><div class="card-custom text-center"><h2 class="fw-bold text-warning">8</h2><small>Suspeitos</small></div></div>
    <div class="col-6 col-md-3"><div class="card-custom text-center"><h2 class="fw-bold text-info">5</h2><small>Medicação</small></div></div>
    <div class="col-6 col-md-3"><div class="card-custom text-center"><h2 class="fw-bold text-danger">3</h2><small>Emergências</small></div></div>
</div>
<div class="card-custom mb-3 border-start border-4 border-danger"><div class="d-flex justify-content-between flex-wrap"><h6 class="text-danger">🚨 Parada Cardiorrespiratória</h6><small>2min</small></div><p class="small">Agente: Carlos Silva • Micro-área 04<br>Paciente idoso, 78 anos, desacordado.</p><button class="btn btn-danger btn-sm" onclick="contactAgent()">Contatar</button></div>
<div class="card-custom border-start border-4 border-warning"><div class="d-flex justify-content-between flex-wrap"><h6 class="text-warning">⚠️ Suspeita de Dengue</h6><small>15min</small></div><p class="small">Gestante com sintomas • Micro-área 12</p><button class="btn btn-warning btn-sm" onclick="alert('Monitorando')">Monitorar</button></div>
@endsection
