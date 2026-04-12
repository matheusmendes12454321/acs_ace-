@extends('layouts.master')

@section('title', 'Microáreas')

@section('content')
<div class="row g-3 g-md-4 mb-4">
    <div class="col-4 col-md-4"><div class="card-custom text-center"><h2 class="fw-bold">12</h2><small>Áreas</small></div></div>
    <div class="col-4 col-md-4"><div class="card-custom text-center"><h2 class="fw-bold text-success">94%</h2><small>Cobertura</small></div></div>
    <div class="col-4 col-md-4"><div class="card-custom text-center"><h2 class="fw-bold text-warning">1</h2><small>Pendente</small></div></div>
</div>
<div class="row g-3 g-md-4">
    <div class="col-md-6"><div class="card-custom"><div class="d-flex justify-content-between align-items-start flex-wrap"><div><h5>Microárea 01 - Centro</h5><p class="small">População: 1.240 hab | Agente: Maria Souza</p><div class="progress-custom"><div class="progress-bar bg-success" style="width:88%"></div></div><small>88% visitas</small></div><button class="btn btn-sm btn-outline-custom" onclick="alert('Editar')"><i class="fas fa-edit"></i></button></div></div></div>
    <div class="col-md-6"><div class="card-custom"><div class="d-flex justify-content-between flex-wrap"><div><h5>Microárea 02 - Encosta</h5><p class="small">População: 850 hab | Agente: João Santos</p><div class="progress-custom"><div class="progress-bar bg-info" style="width:72%"></div></div><small>72% visitas</small></div><button class="btn btn-sm btn-outline-custom" onclick="alert('Editar')"><i class="fas fa-edit"></i></button></div></div></div>
    <div class="col-md-6"><div class="card-custom bg-warning bg-opacity-10"><div class="d-flex justify-content-between flex-wrap"><div><h5>⚠️ Microárea 03 - Vale</h5><p class="small">População: 2.100 hab | <span class="text-danger">Sem Agente</span></p><div class="progress-custom"><div class="progress-bar bg-danger" style="width:0%"></div></div><small>0% visitas</small></div><button class="btn btn-sm btn-outline-custom" onclick="alert('Atribuir agente')"><i class="fas fa-user-plus"></i></button></div></div></div>
    <div class="col-md-6"><div class="card-custom"><div class="d-flex justify-content-between flex-wrap"><div><h5>Microárea 04 - Industrial</h5><p class="small">População: 620 hab | Agente: Ana Luiza</p><div class="progress-custom"><div class="progress-bar bg-success" style="width:95%"></div></div><small>95% visitas</small></div><button class="btn btn-sm btn-outline-custom" onclick="alert('Editar')"><i class="fas fa-edit"></i></button></div></div></div>
</div>
<div class="row mt-4"><div class="col-12"><div class="card-custom"><h5>Criar Nova Microárea</h5><button class="btn btn-grad" data-bs-toggle="modal" data-bs-target="#microareaModal"><i class="fas fa-plus me-2"></i>Novo Polígono</button></div></div></div>

<!-- Modal Nova Microárea -->
<div class="modal fade" id="microareaModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered"><div class="modal-content modal-custom"><div class="modal-header border-0"><h5 class="modal-title fw-bold"><i class="fas fa-draw-polygon me-2"></i>Nova Microárea</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div><div class="modal-body"><form><div class="mb-3"><label class="form-label">Nome</label><input type="text" class="form-control"></div><div class="mb-3"><label class="form-label">Agente</label><select class="form-select"><option>Maria Souza</option></select></div></form></div><div class="modal-footer border-0"><button class="btn btn-outline-custom" data-bs-dismiss="modal">Cancelar</button><button class="btn btn-grad" onclick="alert('Microárea criada!')">Criar</button></div></div></div>
</div>
@endsection
