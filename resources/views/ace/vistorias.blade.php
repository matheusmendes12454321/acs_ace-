@extends('layouts.master')

@section('title', 'Registro de Vistorias')

@section('content')
<div class="row g-3 g-md-4">
    <div class="col-md-6"><div class="card-custom"><h5>Próximas Vistorias</h5><div class="p-3 bg-light rounded-3 mb-3"><strong>📍 Rua das Flores, 120</strong><br><span class="badge bg-danger">URGENTE</span><br><button class="btn btn-grad btn-sm mt-2" onclick="alert('Iniciar')">Iniciar</button></div><div class="list-group"><div class="list-group-item d-flex justify-content-between flex-wrap"><span>10:30</span><span>Av. Central, 450</span><button class="btn btn-sm btn-light" onclick="alert('Agendar')">Agendar</button></div></div></div></div>
    <div class="col-md-6"><div class="card-custom"><h5>Registrar Vistoria</h5><form><div class="mb-2"><input type="text" class="form-control" placeholder="Endereço"></div><div class="mb-2"><select class="form-select"><option>Dengue</option><option>Zika</option></select></div><div class="mb-2"><input type="file" class="form-control" accept="image/*"></div><button type="button" class="btn btn-grad w-100" onclick="registerInspection()">Registrar</button></form></div></div>
</div>
@endsection
