@extends('layouts.master')

@section('title', 'Visão Macro de Saúde')

@section('content')
<div class="container-fluid p-0">
    
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold text-navy mb-1">Visão Macro de Saúde</h4>
            <p class="text-muted small"><i class="fas fa-map-marker-alt me-2"></i>Distrito Sanitário Norte • Atualizado agora</p>
        </div>
        <div class="btn-group shadow-sm rounded-pill bg-white p-1">
            <button class="btn btn-primary rounded-pill px-3 btn-sm fw-bold">Mensal</button>
            <button class="btn btn-white rounded-pill px-3 btn-sm fw-bold">Semanal</button>
            <button class="btn btn-white rounded-pill px-3 btn-sm fw-bold">Hoje</button>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-md-3">
            <div class="card-custom border-0 shadow-sm text-center py-4">
                <div class="icon-circle bg-primary-subtle text-primary mx-auto mb-3">
                    <i class="fas fa-walking"></i>
                </div>
                <span class="badge bg-success-subtle text-success rounded-pill mb-2">+12%</span>
                <p class="text-muted small fw-bold mb-1">TOTAL DE VISITAS</p>
                <h2 class="fw-bold mb-0">1.284</h2>
                <div class="px-4 mt-2">
                    <div class="progress" style="height: 4px;"><div class="progress-bar" style="width: 80%"></div></div>
                    <small class="extra-small text-muted">META: 1.600</small>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card-custom border-0 shadow-sm text-center py-4">
                <div class="icon-circle bg-info-subtle text-info mx-auto mb-3">
                    <i class="fas fa-users"></i>
                </div>
                <span class="badge bg-light text-dark rounded-pill mb-2">Estável</span>
                <p class="text-muted small fw-bold mb-1">FAMÍLIAS COBERTAS</p>
                <h2 class="fw-bold mb-0">4.520</h2>
                <div class="px-4 mt-2">
                    <div class="progress" style="height: 4px;"><div class="progress-bar bg-info" style="width: 92%"></div></div>
                    <small class="extra-small text-muted">META: 4.800</small>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card-custom border-0 shadow-sm text-center py-4">
                <div class="icon-circle bg-danger-subtle text-danger mx-auto mb-3">
                    <i class="fas fa-virus"></i>
                </div>
                <span class="badge bg-danger-subtle text-danger rounded-pill mb-2">+4%</span>
                <p class="text-muted small fw-bold mb-1">ALERTAS ATIVOS</p>
                <h2 class="fw-bold mb-0">24</h2>
                <small class="text-danger small fw-bold">NÍVEL: MODERADO</small>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card-custom border-0 shadow-sm bg-navy text-white text-center py-4" style="background: #00426d !important;">
                <div class="icon-circle bg-white bg-opacity-20 mx-auto mb-3">
                    <i class="fas fa-chart-line"></i>
                </div>
                <p class="small fw-bold mb-1 opacity-75">PRODUTIVIDADE MÉDIA</p>
                <h1 class="fw-bold mb-0">94%</h1>
                <p class="extra-small mb-0 mt-2"><i class="fas fa-shield-alt me-1"></i>Acima da média municipal</p>
            </div>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-lg-8">
            <div class="card-custom h-100">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="fw-bold text-navy">Tendência de Atendimentos</h5>
                    <div class="d-flex gap-3 small">
                        <span><i class="fas fa-circle text-primary me-1"></i> Realizado</span>
                        <span><i class="fas fa-circle text-light me-1"></i> Projeção</span>
                    </div>
                </div>
                <div class="d-flex align-items-end justify-content-between px-3" style="height: 250px;">
                    <div class="text-center">
                        <div class="bg-light rounded-top" style="width: 45px; height: 120px;"></div>
                        <small class="text-muted d-block mt-2">Seg</small>
                    </div>
                    <div class="text-center">
                        <div class="bg-light rounded-top" style="width: 45px; height: 160px;"></div>
                        <small class="text-muted d-block mt-2">Ter</small>
                    </div>
                    <div class="text-center">
                        <div class="bg-light rounded-top" style="width: 45px; height: 210px;"></div>
                        <small class="text-muted d-block mt-2">Qua</small>
                    </div>
                    <div class="text-center">
                        <div class="bg-primary rounded-top" style="width: 45px; height: 240px; background: #00426d !important;"></div>
                        <small class="text-muted d-block mt-2 fw-bold">Qui</small>
                    </div>
                    <div class="text-center">
                        <div class="bg-light rounded-top" style="width: 45px; height: 190px;"></div>
                        <small class="text-muted d-block mt-2">Sex</small>
                    </div>
                    <div class="text-center">
                        <div class="bg-light border-top border-primary rounded-top" style="width: 45px; height: 140px; border-style: dashed !important;"></div>
                        <small class="text-muted d-block mt-2">Sáb</small>
                    </div>
                </div>
                
                <div class="row mt-4 pt-3 border-top text-center">
                    <div class="col-4 border-end">
                        <small class="text-muted d-block">MÉDIA DIÁRIA</small>
                        <span class="fw-bold">42 visitas</span>
                    </div>
                    <div class="col-4 border-end">
                        <small class="text-muted d-block">PICO DO PERÍODO</small>
                        <span class="fw-bold">Quarta-feira</span>
                    </div>
                    <div class="col-4">
                        <small class="text-muted d-block">CONVERSÃO ACS</small>
                        <span class="fw-bold text-success">88.4%</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card-custom h-100">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="fw-bold text-navy">Alertas Críticos</h5>
                    <a href="#" class="small text-decoration-none">Ver todos</a>
                </div>

                <div class="alert-item p-3 rounded-4 mb-3 border-start border-danger border-4 bg-danger-subtle bg-opacity-10">
                    <div class="d-flex justify-content-between mb-1">
                        <span class="extra-small fw-bold text-danger">SURTOS ATIVOS</span>
                        <span class="extra-small text-muted">Há 2h</span>
                    </div>
                    <p class="small fw-bold mb-1">Possível foco de Dengue em 03 residências</p>
                    <small class="text-muted">Setor Norte, Equipe Beta</small>
                </div>

                <div class="alert-item p-3 rounded-4 mb-3 border-start border-info border-4 bg-info-subtle bg-opacity-10">
                    <div class="d-flex justify-content-between mb-1">
                        <span class="extra-small fw-bold text-info">GESTANTE EM RISCO</span>
                        <span class="extra-small text-muted">Há 5h</span>
                    </div>
                    <p class="small fw-bold mb-1">Maria Santos: Pré-natal atrasado + Hipertensão</p>
                    <small class="text-muted">Visita prioritária recomendada</small>
                </div>

                <div class="alert-item p-3 rounded-4 mb-4 border-start border-primary border-4 bg-primary-subtle bg-opacity-10">
                    <div class="d-flex justify-content-between mb-1">
                        <span class="extra-small fw-bold text-primary">META DE VACINAÇÃO</span>
                        <span class="extra-small text-muted">Ontem</span>
                    </div>
                    <p class="small fw-bold mb-1">Campanha de Gripe: Setor Sul abaixo de 50%</p>
                    <small class="text-muted">Realocar agentes para o fim de semana</small>
                </div>

                <button class="btn btn-outline-dark w-100 rounded-pill py-2 fw-bold small">Gerar Relatório de Intervenção</button>
            </div>
        </div>
    </div>

    <div class="card-custom border-0 shadow-sm">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="fw-bold text-navy">Liderança de Equipes</h5>
            <span class="badge bg-light text-dark px-3 py-2 rounded-pill">Total: 8 Equipes</span>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr class="extra-small text-muted text-uppercase">
                        <th class="border-0 ps-4">Equipe</th>
                        <th class="border-0">Responsável</th>
                        <th class="border-0">Produtividade</th>
                        <th class="border-0 text-center">Visitas / Mês</th>
                        <th class="border-0 text-end pe-4">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="ps-4">
                            <div class="d-flex align-items-center">
                                <span class="badge bg-primary-subtle text-primary me-3 p-2 rounded-3">A</span>
                                <span class="fw-bold">Equipe Alfa</span>
                            </div>
                        </td>
                        <td>Dr. Ricardo Mendes</td>
                        <td style="width: 200px;">
                            <div class="d-flex align-items-center">
                                <div class="progress flex-grow-1 me-2" style="height: 6px;"><div class="progress-bar bg-success" style="width: 98%"></div></div>
                                <small class="fw-bold">98%</small>
                            </div>
                        </td>
                        <td class="text-center fw-bold">210</td>
                        <td class="text-end pe-4"><span class="badge bg-info-subtle text-info px-3">EXCELENTE</span></td>
                    </tr>
                    <tr>
                        <td class="ps-4">
                            <div class="d-flex align-items-center">
                                <span class="badge bg-info-subtle text-info me-3 p-2 rounded-3">B</span>
                                <span class="fw-bold">Equipe Beta</span>
                            </div>
                        </td>
                        <td>Enf. Carla Lima</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="progress flex-grow-1 me-2" style="height: 6px;"><div class="progress-bar" style="width: 82%"></div></div>
                                <small class="fw-bold">82%</small>
                            </div>
                        </td>
                        <td class="text-center fw-bold">185</td>
                        <td class="text-end pe-4"><span class="badge bg-light text-muted px-3">NORMAL</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
    .text-navy { color: #00426d; }
    .bg-navy { background-color: #00426d; }
    .icon-circle { width: 48px; height: 48px; display: flex; align-items: center; justify-content: center; border-radius: 14px; font-size: 1.2rem; }
    .extra-small { font-size: 0.65rem; font-weight: 800; letter-spacing: 0.5px; }
    .card-custom { border-radius: 20px; transition: transform 0.2s; }
    .progress { background-color: #f0f2f5; border-radius: 10px; }
    .table thead th { font-weight: 700; color: #5a6e7a; padding: 15px 10px; }
    .table tbody td { padding: 18px 10px; border-bottom: 1px solid #f0f2f5; font-size: 0.9rem; }
</style>
@endsection