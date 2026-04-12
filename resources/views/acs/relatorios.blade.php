@extends('layouts.master')

@section('title', 'Meus Relatórios')

@section('content')
<div class="row g-3 g-md-4">
    <div class="col-md-6"><div class="card-custom text-center"><h2>124</h2><small>Visitas</small><span class="text-success d-block">+12%</span></div></div>
    <div class="col-md-6"><div class="card-custom text-center"><h2>80%</h2><small>Meta</small><div class="progress-custom mt-2"><div class="progress-bar bg-info" style="width:80%"></div></div></div></div>
</div>
<div class="row mt-4"><div class="col-12"><div class="card-custom"><h5>Exportar</h5><div class="d-flex gap-2 flex-wrap"><button class="btn btn-outline-custom btn-sm" onclick="exportReport('PDF')">PDF</button><button class="btn btn-outline-custom btn-sm" onclick="exportReport('Excel')">Excel</button></div></div></div></div>
@endsection
