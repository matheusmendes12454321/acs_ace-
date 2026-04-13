@extends('layouts.master')
@section('title', 'Relatórios')
@section('content')
<div class="row"><div class="col-md-6"><div class="card-custom text-center"><h2>124</h2><small>Visitas no mês</small><span class="text-success d-block">+12%</span><div class="progress-custom mt-2"><div class="progress-bar bg-success" style="width:62%"></div></div></div></div>
<div class="col-md-6"><div class="card-custom text-center"><h2>80%</h2><small>Meta de Visitas</small><div class="progress-custom mt-2"><div class="progress-bar bg-info" style="width:80%"></div></div></div></div></div>
<div class="row mt-4"><div class="col-12"><div class="card-custom"><h5>Exportar Relatório</h5><div class="d-flex gap-2"><button class="btn btn-outline-custom" onclick="showAlert('PDF')">PDF</button><button class="btn btn-outline-custom" onclick="showAlert('Excel')">Excel</button><button class="btn btn-outline-custom" onclick="showAlert('XML')">XML e-SUS</button></div></div></div></div>
@endsection
