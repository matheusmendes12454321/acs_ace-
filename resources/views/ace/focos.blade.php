@extends('layouts.master')
@section('title', 'Focos de Endemias')
@section('content')
<div class="row g-4 mb-4"><div class="col-4"><div class="card-custom text-center"><h2 class="text-danger">8</h2><small>Críticos</small></div></div><div class="col-4"><div class="card-custom text-center"><h2 class="text-warning">15</h2><small>Moderados</small></div></div><div class="col-4"><div class="card-custom text-center"><h2 class="text-success">42</h2><small>Monitorados</small></div></div></div>
<div class="card-custom"><div class="table-responsive"><table class="table-custom"><thead><tr><th>Código</th><th>Local</th><th>Tipo</th><th>Risco</th><th>Ações</th></tr></thead><tbody><tr><td>#843</td><td>Rua das Palmeiras, 452</td><td>Dengue</td><td><span class="badge bg-danger">CRÍTICO</span></td><td><button class="btn btn-sm btn-light" onclick="showAlert('Ver detalhes')">Ver</button></td></tr>
	<tr><td>#842</td><td>Av. Central, 1205</td><td>Zika</td><td><span class="badge bg-warning">MODERADO</span></td><td><button class="btn btn-sm btn-light" onclick="showAlert('Ver detalhes')">Ver</button></td></tr>
</tbody></table></div></div>
@endsection
