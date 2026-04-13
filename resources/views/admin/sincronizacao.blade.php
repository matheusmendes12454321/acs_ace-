@extends('layouts.master')
@section('title', 'Sincronização')
@section('content')
<div class="row"><div class="col-md-5"><div class="card-custom text-center"><i class="fas fa-cloud-upload-alt fa-3x text-primary mb-3"></i><h3>12 Registros</h3><p>320kb aguardando</p><button class="btn btn-grad w-100" onclick="showAlert('Sincronizando...')">Sincronizar Agora</button><div class="mt-2"><small>Modo Offline: <strong class="text-success">Ativo</strong></small></div></div></div>
<div class="col-md-7"><div class="card-custom"><h5>Últimas Sincronizações</h5><div class="d-flex justify-content-between py-2 border-bottom"><span>✅ Hoje, 08:12</span><span>42 registros</span></div><div class="d-flex justify-content-between py-2"><span>✅ Ontem, 17:45</span><span>156 registros</span></div></div></div></div>
@endsection
