@extends('layouts.master')

@section('title', 'Minhas Rotas')

@section('content')
<div class="row g-3 g-md-4">
    <div class="col-md-8"><div class="card-custom"><h5>Mapa de Rotas</h5><div id="routesMap" class="map-container" style="height: 350px;"></div></div></div>
    <div class="col-md-4"><div class="card-custom"><h5>Rota Otimizada</h5><div class="alert alert-success small"><i class="fas fa-check-circle me-2"></i>Economia de 12.4km</div><div class="list-group list-group-flush"><div class="list-group-item px-0">1. Família Silva - 650m</div><div class="list-group-item px-0">2. Família Oliveira - 1.2km</div></div><button class="btn btn-grad w-100 mt-3" onclick="alert('Rota recalculada!')">Recalcular</button></div></div>
</div>
@endsection

@push('scripts')
<script>
    setTimeout(() => {
        const map = L.map('routesMap').setView([-23.5505, -46.6333], 13);
        L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', { attribution: '© OpenStreetMap' }).addTo(map);
        L.marker([-23.5505, -46.6333]).addTo(map);
        L.marker([-23.545, -46.638]).addTo(map);
        L.polyline([[-23.5505, -46.6333], [-23.545, -46.638]], { color: '#00426d', weight: 4 }).addTo(map);
    }, 100);
</script>
@endpush
