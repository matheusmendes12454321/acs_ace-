@extends('layouts.master')

@section('title', 'Auditoria de Visitas')

@section('content')
<div class="row g-3 g-md-4 mb-4">
    <div class="col-6 col-md-3"><div class="card-custom text-center"><h2 class="fw-bold">1.284</h2><small>Visitas</small></div></div>
    <div class="col-6 col-md-3"><div class="card-custom text-center"><h2 class="fw-bold text-warning">42</h2><small>Revisão</small></div></div>
    <div class="col-6 col-md-3"><div class="card-custom text-center"><h2 class="fw-bold">8.4/dia</h2><small>Média</small></div></div>
    <div class="col-6 col-md-3"><div class="card-custom text-center"><h2 class="fw-bold text-success">94%</h2><small>Eficiência</small></div></div>
</div>
<div class="row g-3 g-md-4">
    <div class="col-md-6"><div class="card-custom"><h5>Timeline - Marcos Silva</h5><div class="mt-3"><div class="border-start border-3 border-success ps-3 pb-3"><small class="text-success">08:45</small><p class="mb-0 small"><strong>Residência #402</strong><br>Biometria verificada ✅</p></div><div class="border-start border-3 border-warning ps-3 pb-3"><small class="text-warning">09:12</small><p class="mb-0 small"><strong>Escola Municipal</strong><br>⚠️ Divergência de localização</p><button class="btn btn-sm btn-outline-warning mt-1" onclick="alert('Revisão solicitada')">Revisar</button></div></div></div></div>
    <div class="col-md-6"><div class="card-custom"><h5>Performance</h5><div class="table-responsive-custom"><table class="table-custom w-100"><thead><tr><th>Agente</th><th>Eficiência</th><th>Status</th></tr></thead><tbody><tr><td>Liana Mendes</td><td>98%</td><td><span class="badge-status bg-success-subtle text-success">EXEMPLAR</span></td></tr><tr><td>Marcos Silva</td><td>84%</td><td><span class="badge-status bg-warning-subtle text-warning">AUDITANDO</span></td></tr></tbody></table></div></div></div>
</div>
@endsection
