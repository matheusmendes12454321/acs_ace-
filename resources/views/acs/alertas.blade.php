@extends('layouts.master')

@section('title', 'Alertas')

@section('content')
<div class="row g-3 g-md-4 mb-4"><div class="col-4"><div class="card-custom text-center"><h2 class="text-danger">3</h2><small>Críticos</small></div></div><div class="col-4"><div class="card-custom text-center"><h2>12</h2><small>Acompanhar</small></div></div><div class="col-4"><div class="card-custom text-center"><h2>45</h2><small>Concluídos</small></div></div></div>
<div class="card-custom border-start border-4 border-danger mb-3"><div class="d-flex justify-content-between flex-wrap"><h6 class="text-danger">🚨 Crise Hipertensiva</h6><small>AGORA</small></div><p class="small">PA 190/110 mmHg. Rua das Flores, 123</p><div><button class="btn btn-danger btn-sm me-2" onclick="callEmergency()">Emergência</button><button class="btn btn-outline-danger btn-sm" onclick="alert('Mapa')">Mapa</button></div></div>
<div class="card-custom border-start border-4 border-warning"><div class="d-flex justify-content-between flex-wrap"><h6 class="text-warning">⚠️ Atraso de Medicação</h6><small>15min</small></div><p class="small">Insulina NPH não confirmada</p><button class="btn btn-warning btn-sm" onclick="alert('Registrado')">Registrar</button></div>
@endsection
