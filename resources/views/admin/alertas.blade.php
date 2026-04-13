@extends('layouts.master')
@section('title', 'Central de Alertas')
@section('content')
<div class="row g-4 mb-4"><div class="col-md-3"><div class="card-custom text-center"><h2 class="text-danger">12</h2><small>Urgência</small></div></div><div class="col-md-3"><div class="card-custom text-center"><h2 class="text-warning">8</h2><small>Suspeitos</small></div></div><div class="col-md-3"><div class="card-custom text-center"><h2 class="text-info">5</h2><small>Medicação</small></div></div><div class="col-md-3"><div class="card-custom text-center"><h2 class="text-danger">3</h2><small>Emergências</small></div></div></div>
<div class="card-custom border-start border-4 border-danger mb-3"><div class="d-flex justify-content-between"><h6 class="text-danger">🚨 Parada Cardiorrespiratória</h6><small>2min</small></div><p>Agente: Carlos Silva • Micro-área 04</p><button class="btn btn-danger btn-sm" onclick="showAlert('Contatando agente')">Contatar Agente</button></div>
<div class="card-custom border-start border-4 border-warning"><div class="d-flex justify-content-between"><h6 class="text-warning">⚠️ Suspeita de Dengue</h6><small>15min</small></div><p>Gestante com sintomas • Micro-área 12</p><button class="btn btn-warning btn-sm" onclick="showAlert('Monitorando caso')">Monitorar</button></div>
@endsection
