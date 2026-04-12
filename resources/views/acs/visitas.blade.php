@extends('layouts.master')

@section('title', 'Registro de Visitas')

@section('content')
<div class="row g-3 g-md-4">
    <div class="col-md-6"><div class="card-custom"><h5>Rota do Dia</h5><div id="visitMap" class="map-container" style="height: 250px; margin-bottom: 16px;"></div><div class="p-3 bg-light rounded-3 mb-3"><div class="d-flex justify-content-between flex-wrap align-items-center"><div><strong>📍 Próxima: Rua das Flores, 120</strong><br><span class="badge bg-warning">Hipertenso</span></div><button class="btn btn-grad btn-sm" onclick="startVisit()">Iniciar</button></div></div><div><div class="d-flex justify-content-between py-2 flex-wrap"><span>10:30</span><strong>Família Oliveira</strong><button class="btn btn-sm btn-light" onclick="alert('Detalhes')">Detalhes</button></div></div></div></div>
    <div class="col-md-6"><div class="card-custom"><h5>Resumo do Dia</h5><div class="d-flex justify-content-between mb-2"><span>Realizadas:</span><strong class="text-success">04</strong></div><div class="d-flex justify-content-between mb-3"><span>Pendentes:</span><strong class="text-warning">06</strong></div><div class="progress-custom mb-3"><div class="progress-bar bg-success" style="width:40%"></div></div><button class="btn btn-outline-custom w-100" onclick="alert('Abrir navegação')"><i class="fas fa-directions me-2"></i>Navegação</button></div></div>
</div>
@endsection

@push('scripts')
<script>
    setTimeout(() => {
        const map = L.map('visitMap').setView([-23.5505, -46.6333], 13);
        L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', { attribution: '© OpenStreetMap' }).addTo(map);
        L.marker([-23.5505, -46.6333]).addTo(map).bindPopup('Rua das Flores, 120');
    }, 100);
</script>
@endpush
