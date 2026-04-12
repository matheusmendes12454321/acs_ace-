@extends('layouts.master')

@section('title', 'Dashboard Administrativo')

@section('content')
<div class="row g-3 g-md-4 mb-4">
    <div class="col-6 col-md-3">
        <div class="card-custom">
            <div class="d-flex justify-content-between align-items-center">
                <div><h6 class="text-muted small">Cobertura</h6><h2 class="fw-bold fs-2">94.2%</h2><small class="text-success">+2.4%</small></div>
                <div class="rounded-circle bg-success bg-opacity-10 p-2 p-md-3"><i class="fas fa-users fa-lg text-success"></i></div>
            </div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="card-custom">
            <div class="d-flex justify-content-between">
                <div><h6 class="text-muted small">Visitas Hoje</h6><h2 class="fw-bold fs-2">1.2k</h2><small class="text-info">+12%</small></div>
                <div class="rounded-circle bg-info bg-opacity-10 p-2 p-md-3"><i class="fas fa-walking fa-lg text-info"></i></div>
            </div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="card-custom">
            <div class="d-flex justify-content-between">
                <div><h6 class="text-muted small">Agentes</h6><h2 class="fw-bold fs-2">84</h2><small class="text-success">+5</small></div>
                <div class="rounded-circle bg-primary bg-opacity-10 p-2 p-md-3"><i class="fas fa-user-md fa-lg text-primary"></i></div>
            </div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="card-custom">
            <div class="d-flex justify-content-between">
                <div><h6 class="text-muted small">Alertas</h6><h2 class="fw-bold fs-2 text-danger">14</h2><small>Críticos</small></div>
                <div class="rounded-circle bg-danger bg-opacity-10 p-2 p-md-3"><i class="fas fa-bell fa-lg text-danger"></i></div>
            </div>
        </div>
    </div>
</div>
<div class="row g-3 g-md-4">
    <div class="col-md-8">
        <div class="card-custom">
            <h5 class="fw-bold mb-3">Tendência de Atendimentos</h5>
            <canvas id="trendChart" height="200"></canvas>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card-custom">
            <h5 class="fw-bold mb-3">Alertas Críticos</h5>
            <div class="mb-3 pb-2 border-bottom">
                <div class="d-flex justify-content-between flex-wrap"><span><i class="fas fa-virus text-danger me-2"></i>Surto Detectado</span><small class="text-danger">12min</small></div>
                <small class="text-muted">Setor Sul - 15 domicílios</small>
            </div>
            <div class="mb-3 pb-2 border-bottom">
                <div class="d-flex justify-content-between flex-wrap"><span><i class="fas fa-chart-line text-warning me-2"></i>Baixa Produtividade</span><small class="text-warning">2h</small></div>
                <small class="text-muted">Equipe 04 - 60% da meta</small>
            </div>
            <button class="btn btn-outline-custom w-100 mt-2" onclick="alert('Ver todos os alertas')">Ver todos →</button>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    const ctx = document.getElementById('trendChart')?.getContext('2d');
    if(ctx) new Chart(ctx, {
        type: 'line',
        data: { labels: ['Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb'], datasets: [{ label: 'Visitas', data: [42, 48, 52, 47, 55, 38], borderColor: '#00426d', backgroundColor: 'rgba(0,66,109,0.1)', tension: 0.4, fill: true }] }
    });
</script>
@endpush
