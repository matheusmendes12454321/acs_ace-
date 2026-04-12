@extends('layouts.master')

@section('title', 'Focos de Endemias')

@section('content')
<div class="row g-3 g-md-4 mb-4">
    <div class="col-4"><div class="card-custom text-center"><h2 class="text-danger">8</h2><small>Críticos</small></div></div>
    <div class="col-4"><div class="card-custom text-center"><h2 class="text-warning">15</h2><small>Moderados</small></div></div>
    <div class="col-4"><div class="card-custom text-center"><h2 class="text-success">42</h2><small>Baixos</small></div></div>
</div>
<div class="card-custom mb-3"><div id="focosMap" class="map-container" style="height: 250px;"></div></div>
<div class="card-custom"><div class="table-responsive-custom"><table class="table-custom w-100"><thead><tr><th>ID</th><th>Local</th><th>Risco</th><th>Ação</th></tr></thead><tbody><tr><td>#843</td><td>Rua das Palmeiras</td><td><span class="badge-risk-high">CRÍTICO</span></td><td><button class="btn btn-sm btn-outline-custom" onclick="alert('Detalhes')">Ver</button></td></tr><tr><td>#842</td><td>Av. Central</td><td><span class="badge-risk-mid">MODERADO</span></td><td><button class="btn btn-sm btn-outline-custom" onclick="alert('Detalhes')">Ver</button></td></tr></tbody></table></div></div>
@endsection

@push('scripts')
<script>
    setTimeout(() => {
        const map = L.map('focosMap').setView([-23.5505, -46.6333], 13);
        L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', { attribution: '© OpenStreetMap' }).addTo(map);
        L.marker([-23.5505, -46.6333]).addTo(map).bindPopup('Foco #843');
    }, 100);
</script>
@endpush
