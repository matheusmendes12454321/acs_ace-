@extends('layouts.master')
@section('title', 'Histórico')
@section('content')
<div class="card-custom">
<div class="border-start border-3 border-primary ps-3 pb-3"><small class="text-primary">15/03/2024 • 14:30</small><h6>Família Silva</h6><p>PA: 120/80, peso: 78.5kg. Paciente estável.</p></div>
<div class="border-start border-3 border-danger ps-3 pb-3"><small class="text-danger">10/03/2024 • 09:15</small><h6>Família Santos</h6><p>⚠️ Crise hipertensiva. Paciente encaminhado para UPA.</p></div>
<div class="border-start border-3 border-success ps-3"><small class="text-success">05/03/2024 • 11:00</small><h6>Família Oliveira</h6><p>Vacinação em dia. Orientação de higiene.</p></div>
</div>
@endsection
