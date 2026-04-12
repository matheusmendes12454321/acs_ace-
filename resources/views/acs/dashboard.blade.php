@extends('layouts.master')

@section('title', 'Dashboard do Agente')

@section('content')
<div class="row g-3 g-md-4 mb-4">
    <div class="col-md-4"><div class="card-custom"><h6>Meta Mensal</h6><h2 class="fw-bold">84%</h2><div class="progress-custom"><div class="progress-bar bg-success" style="width:84%"></div></div><small>168 de 200 visitas</small></div></div>
    <div class="col-md-4"><div class="card-custom"><h6>Rota Otimizada</h6><h2 class="fw-bold text-success">-12.4 km</h2><small>Economia hoje</small></div></div>
    <div class="col-md-4"><div class="card-custom"><h6>Próxima Visita</h6><p class="mb-0"><strong>Família Silva</strong><br>Setor 4 • 14:30</p><button class="btn btn-grad btn-sm mt-2 w-100" onclick="startVisit()">Iniciar</button></div></div>
</div>
<div class="row g-3 g-md-4">
    <div class="col-md-6"><div class="card-custom"><h5>Atividades Recentes</h5><div class="py-2 border-bottom"><small>09:45</small><p>✅ Visita Concluída - Família Oliveira</p></div><div class="py-2"><small>Ontem</small><p>⚠️ Alerta - Maria Santos</p></div></div></div>
    <div class="col-md-6"><div class="card-custom"><h5>Sincronização</h5><div class="text-center py-3"><i class="fas fa-sync-alt fa-2x text-primary mb-2"></i><p>12 formulários pendentes</p><button class="btn btn-grad btn-sm" onclick="syncNow()">Sincronizar</button></div></div></div>
</div>
@endsection
