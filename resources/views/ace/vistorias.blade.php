@extends('layouts.master')
@section('title', 'Vistorias')
@section('content')
<div class="row">
<div class="col-md-6"><div class="card-custom"><h5>Próximas Vistorias</h5><div class="bg-light p-3 rounded-3 mb-3"><strong>📍 Rua das Flores, 120</strong><br><span class="badge bg-danger">URGENTE</span><button class="btn btn-grad btn-sm mt-2" onclick="showAlert('Iniciar vistoria')">Iniciar</button></div>
<div class="d-flex justify-content-between py-2"><span>10:30</span><span>Av. Central, 450</span><button class="btn btn-sm btn-light" onclick="showAlert('Agendar')">Agendar</button></div></div></div>
<div class="col-md-6"><div class="card-custom"><h5>Registrar Vistoria</h5><form><div class="mb-2"><input type="text" class="form-control" placeholder="Endereço"></div><div class="mb-2"><select class="form-select"><option>Dengue</option><option>Zika</option></select></div><div class="mb-2"><input type="file" class="form-control"></div><button type="button" class="btn btn-grad w-100" onclick="showAlert('Vistoria registrada')">Registrar</button></form></div></div>
</div>
@endsection
