@extends('layouts.master')
@section('title', 'Monitoramento de Endemias')
@section('content')
<div class="row g-4 mb-4"><div class="col-md-3"><div class="card-custom text-center"><h2 class="text-danger">124</h2><small>Casos</small></div></div><div class="col-md-3"><div class="card-custom text-center"><h2>48</h2><small>Visitas</small></div></div><div class="col-md-3"><div class="card-custom text-center"><h2 class="text-warning">8</h2><small>Focos</small></div></div><div class="col-md-3"><div class="card-custom text-center"><h2 class="text-success">92%</h2><small>Cobertura</small></div></div></div>
<div class="card-custom" style="background: linear-gradient(135deg, #00426d, #005a92); color:white;"><h5>🚨 Alerta: Foco Crítico</h5><p>Rua das Palmeiras, 452 - Setor Sul</p><button class="btn btn-light" onclick="showAlert('Intervenção delegada')">Delegar Intervenção</button></div>
@endsection
