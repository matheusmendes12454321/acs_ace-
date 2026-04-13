@extends('layouts.master')
@section('title', 'Auditoria de Visitas')
@section('content')
<div class="row g-4 mb-4"><div class="col-md-3"><div class="card-custom"><h2>1.284</h2><small>Visitas</small></div></div><div class="col-md-3"><div class="card-custom"><h2 class="text-warning">42</h2><small>Revisão</small></div></div><div class="col-md-3"><div class="card-custom"><h2>94%</h2><small>Eficiência</small></div></div><div class="col-md-3"><div class="card-custom"><h2>8.4/dia</h2><small>Média</small></div></div></div>
<div class="card-custom"><h5>Timeline - Marcos Silva</h5><div class="border-start border-3 border-success ps-3 pb-2"><small>08:45</small><p>Residência #402 - Verificado ✅</p></div><div class="border-start border-3 border-warning ps-3"><small>09:12</small><p>Escola Municipal - Divergência ⚠️</p><button class="btn btn-sm btn-warning mt-1" onclick="showAlert('Revisão solicitada')">Solicitar Revisão</button></div></div>
@endsection
