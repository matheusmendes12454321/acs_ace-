@extends('layouts.master')
@section('title', 'Relatórios')
@section('content')
<div class="row"><div class="col-md-6"><div class="card-custom"><h5>Exportar Relatório</h5><button class="btn btn-outline-custom w-100 mb-2" onclick="showAlert('PDF')">📄 PDF Professional</button><button class="btn btn-outline-custom w-100 mb-2" onclick="showAlert('Excel')">📊 Excel (XLSX)</button><button class="btn btn-outline-custom w-100" onclick="showAlert('XML')">🔄 XML e-SUS</button></div></div>
<div class="col-md-6"><div class="card-custom"><h5>Exportações Recentes</h5><div class="d-flex justify-content-between py-2 border-bottom"><span>📄 Boletim Mensal</span><span>Hoje 14:20</span><button class="btn btn-sm btn-light" onclick="showAlert('Download')">⬇️</button></div><div class="d-flex justify-content-between py-2"><span>📊 Produção</span><span>Hoje 09:15</span><button class="btn btn-sm btn-light" onclick="showAlert('Download')">⬇️</button></div></div></div></div>
@endsection
