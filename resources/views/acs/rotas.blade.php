@extends('layouts.master')
@section('title', 'Minhas Rotas')
@section('content')
<div class="row">
<div class="col-md-7"><div class="card-custom"><h5>Mapa de Rotas</h5><div id="map" style="height: 400px; background: #e5e7eb; border-radius: 16px; display: flex; align-items: center; justify-content: center;"><i class="fas fa-map fa-3x text-muted"></i><p class="ms-2">Mapa interativo</p></div></div></div>
<div class="col-md-5"><div class="card-custom"><h5>Rota Otimizada</h5><div class="alert alert-success">Economia de 12.4km</div><div class="list-group"><div class="list-group-item">1. Família Silva - 650m</div><div class="list-group-item">2. Família Oliveira - 1.2km</div><div class="list-group-item">3. Dona Maria - 800m</div></div><button class="btn btn-grad w-100 mt-3" onclick="showAlert('Rota recalculada')">Recalcular Rota</button></div></div>
</div>
@endsection
