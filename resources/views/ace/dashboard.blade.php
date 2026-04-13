@extends('layouts.master')
@section('title', 'Dashboard ACE')
@section('content')
<div class="container-fluid p-0">
    <div class="row g-4 mb-4">
        <div class="col-md-6 col-xl-4">
            <div class="card-custom border-start border-danger border-5">
                <p class="text-muted small fw-bold mb-1">FOCOS ATIVOS</p>
                <div class="d-flex align-items-center justify-content-between">
                    <h2 class="fw-bold text-danger mb-0">124</h2>
                    <i class="fas fa-biohazard text-danger opacity-25 fa-2x"></i>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card-custom border-start border-warning border-5">
                <p class="text-muted small fw-bold mb-1">ALTO RISCO</p>
                <div class="d-flex align-items-center justify-content-between">
                    <h2 class="fw-bold text-warning mb-0">08</h2>
                    <i class="fas fa-radiation text-warning opacity-25 fa-2x"></i>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-xl-4">
            <div class="card-custom border-start border-success border-5">
                <p class="text-muted small fw-bold mb-1">VISTORIAS HOJE</p>
                <div class="d-flex align-items-center justify-content-between">
                    <h2 class="fw-bold text-success mb-0">48</h2>
                    <i class="fas fa-search-location text-success opacity-25 fa-2x"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-lg-7">
            <div class="card-custom">
                <h5 class="fw-bold text-navy mb-4"><i class="fas fa-camera me-2"></i>Evidências Recentes</h5>
                <div class="d-flex gap-3 overflow-auto pb-2">
                    <div class="bg-light rounded-4 p-2 text-center" style="min-width: 120px;">
                        <div class="bg-secondary rounded-3 mb-2" style="height: 80px;"></div>
                        <span class="extra-small fw-bold">Foco #843</span>
                    </div>
                    <div class="bg-light rounded-4 p-2 text-center" style="min-width: 120px;">
                        <div class="bg-secondary rounded-3 mb-2" style="height: 80px;"></div>
                        <span class="extra-small fw-bold">Foco #842</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="card-custom bg-navy text-white" style="background-color: #0a2b3e !important;">
                <h5 class="fw-bold mb-3">Gestão de Equipes</h5>
                <p class="small opacity-75">Alocar agentes para bloqueio químico no Setor Sul.</p>
                <button class="btn btn-accent w-100 fw-bold py-2 mt-2" style="background: var(--accent); border:none; color: #0a2b3e;">Alocar Agora</button>
            </div>
        </div>
    </div>
</div>
@endsection