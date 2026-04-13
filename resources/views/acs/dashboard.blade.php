@extends('layouts.master')
@section('title', 'Dashboard ACS')
@section('content')
<div class="container-fluid p-0">
    <div class="card-custom mb-4 border-0" style="background: linear-gradient(135deg, #00426d 0%, #00b4d8 100%); color: white;">
        <div class="row align-items-center p-2">
            <div class="col-md-8">
                <h4 class="fw-bold">Próxima Visita Agendada</h4>
                <p class="mb-0 opacity-75"><i class="fas fa-map-marker-alt me-2"></i>Família Silva - Rua das Flores, 123 (14:30)</p>
            </div>
            <div class="col-md-4 text-md-end mt-3 mt-md-0">
                <button class="btn btn-light fw-bold rounded-pill px-4 py-2">Iniciar Agora</button>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-md-6">
            <div class="card-custom">
                <h6 class="text-muted fw-bold mb-3">PROGRESSO DA META</h6>
                <div class="d-flex justify-content-between align-items-end mb-2">
                    <h2 class="fw-bold mb-0">84%</h2>
                    <small class="text-muted">168 / 200 visitas</small>
                </div>
                <div class="progress-custom mb-3"><div class="progress-bar bg-primary" style="width: 84%"></div></div>
                <p class="small text-muted mb-0">Excelente ritmo! Você está próximo da meta mensal.</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card-custom h-100">
                <h6 class="text-muted fw-bold mb-3">SINCRONIZAÇÃO</h6>
                <div class="d-flex align-items-center">
                    <div class="p-3 bg-warning-subtle text-warning rounded-4 me-3"><i class="fas fa-sync fa-xl"></i></div>
                    <div><h4 class="fw-bold mb-0">12</h4><p class="text-muted small mb-0">Formulários Pendentes</p></div>
                </div>
                <button class="btn btn-outline-custom btn-sm w-100 mt-3">Sincronizar Dados</button>
            </div>
        </div>
    </div>
</div>
@endsection