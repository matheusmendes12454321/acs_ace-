@extends('layouts.master')

@section('title', 'Relatórios e Exportação')

@section('content')
<div class="row g-3 g-md-4">
    <div class="col-md-6"><div class="card-custom"><h5>Configurar Exportação</h5><select class="form-select mb-3"><option>UBS Central</option></select><select class="form-select mb-3"><option>Todas as Microáreas</option></select><hr><div class="d-flex gap-2 flex-wrap"><button class="btn btn-outline-custom btn-sm" onclick="exportReport('PDF')">PDF</button><button class="btn btn-outline-custom btn-sm" onclick="exportReport('Excel')">Excel</button><button class="btn btn-outline-custom btn-sm" onclick="exportReport('XML')">XML</button></div></div></div>
    <div class="col-md-6"><div class="card-custom"><h5>Exportações Recentes</h5><div class="d-flex justify-content-between py-2 border-bottom flex-wrap"><span>📄 Boletim Mensal</span><span>Hoje 14:20</span><button class="btn btn-sm btn-light" onclick="downloadReport()">⬇️</button></div><div class="d-flex justify-content-between py-2 border-bottom flex-wrap"><span>📊 Produção</span><span>Hoje 09:15</span><button class="btn btn-sm btn-light" onclick="downloadReport()">⬇️</button></div></div></div>
</div>
<div class="row mt-4"><div class="col-12"><div class="card-custom"><h5>Produção por Microárea</h5><div class="table-responsive-custom"><table class="table-custom w-100"><thead><tr><th>Microárea</th><th>Supervisor</th><th>Visitas</th><th>Status</th></tr></thead><tbody><tr><td>MA01</td><td>Dr. Ricardo Silva</td><td>248 ↑12%</td><td><span class="badge-status bg-success-subtle text-success">SINCRONIZADO</span></td></tr><tr><td>MA02</td><td>Ana Martins</td><td>192 ↓4%</td><td><span class="badge-status bg-warning-subtle text-warning">EM PROCESSO</span></td></tr></tbody></table></div></div></div></div>
@endsection
