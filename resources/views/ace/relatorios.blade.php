@extends('layouts.master')

@section('title', 'Relatórios de Endemias')

@section('content')
<div class="row g-3 g-md-4 mb-4"><div class="col-md-6"><div class="card-custom text-center"><h2>87%</h2><small>Vistorias</small><div class="progress-custom mt-2"><div class="progress-bar bg-success" style="width:87%"></div></div></div></div><div class="col-md-6"><div class="card-custom text-center"><h2 class="text-success">142</h2><small>Focos Eliminados</small></div></div></div>
<div class="card-custom"><h5>Exportar</h5><div class="d-flex gap-2 flex-wrap"><button class="btn btn-outline-custom btn-sm" onclick="exportReport('PDF')">PDF</button><button class="btn btn-outline-custom btn-sm" onclick="exportReport('Excel')">Excel</button></div></div>
@endsection
