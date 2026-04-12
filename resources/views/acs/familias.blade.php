@extends('layouts.master')

@section('title', 'Cadastro de Famílias')

@section('content')
<div class="row g-3 g-md-4 mb-4">
    <div class="col-6 col-md-3"><div class="card-custom text-center"><h2 class="fw-bold">142</h2><small>Famílias</small></div></div>
    <div class="col-6 col-md-3"><div class="card-custom text-center"><h2 class="fw-bold text-success">8</h2><small>Gestantes</small></div></div>
    <div class="col-6 col-md-3"><div class="card-custom text-center"><h2 class="fw-bold text-danger">12</h2><small>Alto Risco</small></div></div>
    <div class="col-6 col-md-3"><div class="card-custom text-center"><h2 class="fw-bold text-warning">24</h2><small>Pendentes</small></div></div>
</div>
<div class="card-custom">
    <div class="d-flex flex-column flex-sm-row justify-content-between mb-4 gap-3">
        <input type="text" class="form-control" placeholder="Buscar família..." style="border-radius:12px; max-width:250px;">
        <button class="btn btn-grad" data-bs-toggle="modal" data-bs-target="#familyModal"><i class="fas fa-plus me-2"></i>Nova Família</button>
    </div>
    <div class="row g-3">
        <div class="col-md-6"><div class="border rounded-3 p-3"><div class="d-flex justify-content-between flex-wrap"><strong>👨‍👩‍👧‍👦 Família Silva Oliveira</strong><span class="badge bg-success">Em dia</span></div><p class="small mb-1">Rua das Palmeiras, 402 • 5 integrantes</p><button class="btn btn-sm btn-outline-custom mt-2" onclick="alert('Ver detalhes')">Ver →</button></div></div>
        <div class="col-md-6"><div class="border rounded-3 p-3"><div class="d-flex justify-content-between flex-wrap"><strong>👵 Família Santos Dumont</strong><span class="badge bg-warning">Pendente</span></div><p class="small mb-1">Av. Central, 1205 • 3 integrantes</p><button class="btn btn-sm btn-outline-custom mt-2" onclick="alert('Ver detalhes')">Ver →</button></div></div>
    </div>
</div>

<!-- Modal Nova Família -->
<div class="modal fade" id="familyModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered"><div class="modal-content modal-custom"><div class="modal-header border-0"><h5 class="modal-title fw-bold"><i class="fas fa-home me-2"></i>Nova Família</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div><div class="modal-body"><form><div class="mb-3"><label class="form-label">Responsável</label><input type="text" class="form-control"></div><div class="mb-3"><label class="form-label">Endereço</label><input type="text" class="form-control"></div><div class="mb-3"><label class="form-label">Integrantes</label><input type="number" class="form-control"></div></form></div><div class="modal-footer border-0"><button class="btn btn-outline-custom" data-bs-dismiss="modal">Cancelar</button><button class="btn btn-grad" onclick="alert('Família cadastrada!')">Cadastrar</button></div></div></div>
</div>
@endsection
