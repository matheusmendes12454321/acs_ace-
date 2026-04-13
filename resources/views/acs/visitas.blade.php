@extends('layouts.master')
@section('title', 'Visitas')
@section('content')
<div class="row">
<div class="col-md-6"><div class="card-custom"><h5>Rota do Dia</h5><div class="bg-light p-3 rounded-3 mb-3"><strong>📍 Próxima: Rua das Flores, 123</strong><br><span class="badge bg-warning">Hipertenso</span><button class="btn btn-grad btn-sm mt-2" onclick="showAlert('Iniciar visita')">Iniciar</button></div>
<div class="d-flex justify-content-between py-2"><span>10:30</span><strong>Família Oliveira</strong><button class="btn btn-sm btn-light" onclick="showAlert('Detalhes')">Detalhes</button></div>
<div class="d-flex justify-content-between py-2"><span>14:00</span><strong>Dona Maria</strong><button class="btn btn-sm btn-light" onclick="showAlert('Detalhes')">Detalhes</button></div></div></div>
<div class="col-md-6"><div class="card-custom"><h5>Resumo do Dia</h5><div class="d-flex justify-content-between mb-2"><span>Realizadas:</span><strong>04</strong></div><div class="d-flex justify-content-between mb-3"><span>Pendentes:</span><strong class="text-warning">06</strong></div><div class="progress-custom"><div class="progress-bar bg-success" style="width:40%"></div></div><button class="btn btn-outline-custom w-100 mt-3" onclick="showAlert('Abrir mapa')"><i class="fas fa-directions me-2"></i>Navegação</button></div></div>
</div>
@endsection
