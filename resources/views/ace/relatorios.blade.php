@extends('layouts.master')
@section('title', 'Relatórios')
@section('content')
<div class="row"><div class="col-md-6"><div class="card-custom text-center"><h2>87%</h2><small>Vistorias Concluídas</small><div class="progress-custom mt-2"><div class="progress-bar bg-success" style="width:87%"></div></div></div></div><div class="col-md-6"><div class="card-custom text-center"><h2 class="text-success">142</h2><small>Focos Eliminados</small></div></div></div>
<div class="row mt-4"><div class="col-12"><div class="card-custom"><h5>Exportar</h5><div class="d-flex gap-2"><button class="btn btn-outline-custom" onclick="showAlert('PDF')">PDF</button><button class="btn btn-outline-custom" onclick="showAlert('Excel')">Excel</button></div></div></div></div>
@endsection
