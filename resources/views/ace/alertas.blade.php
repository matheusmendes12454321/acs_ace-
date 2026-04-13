@extends('layouts.master')
@section('title', 'Alertas')
@section('content')
<div class="card-custom border-start border-4 border-danger mb-3"><div class="d-flex justify-content-between"><h6 class="text-danger">🚨 Suspeita de Zika</h6><small>12min</small></div><p>Gestante com sintomas - Micro-área 042</p><button class="btn btn-danger btn-sm" onclick="showAlert('Priorizar vistoria')">Priorizar</button></div>
<div class="card-custom border-start border-4 border-warning"><div class="d-flex justify-content-between"><h6 class="text-warning">⚠️ Risco Ambiental</h6><small>2h</small></div><p>Aumento de 40% no risco no Setor Sul</p><button class="btn btn-warning btn-sm" onclick="showAlert('Ver mapa')">Mapa de Calor</button></div>
@endsection
