@extends('layouts.master')

@section('title', 'Histórico Familiar')

@section('content')
<div class="card-custom">
    <div class="d-flex gap-2 mb-4 flex-wrap"><select class="form-select w-auto"><option>Família Silva Oliveira</option></select><button class="btn btn-outline-custom btn-sm" onclick="alert('Filtrar')">Filtrar</button></div>
    <div class="border-start border-3 border-primary ps-3 pb-3"><small>15 OUT, 2023 • 14:30</small><h6>Família Silva Oliveira</h6><p class="small">PA: 120/80, 78.5kg. Medicação mantida.</p></div>
    <div class="border-start border-3 border-danger ps-3 pb-3"><small>12 OUT, 2023 • 09:15</small><h6>Família Souza Santos</h6><p class="small">⚠️ Crise hipoglicêmica. Encaminhado para UPA.</p></div>
    <div class="border-start border-3 border-success ps-3"><small>08 OUT, 2023 • 11:00</small><h6>Família Pereira Magalhães</h6><p class="small">Vacinação em dia. Orientação de higiene.</p></div>
</div>
@endsection
