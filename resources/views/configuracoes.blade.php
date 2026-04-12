@extends('layouts.master')

@section('title', 'Configurações')

@section('content')
<div class="card-custom" style="max-width:600px; margin:0 auto;">
    <h5>Preferências</h5>
    <div class="d-flex justify-content-between align-items-center py-2 border-bottom"><span><i class="fas fa-moon me-2"></i>Modo Escuro</span><div class="form-check form-switch"><input class="form-check-input" type="checkbox"></div></div>
    <div class="d-flex justify-content-between align-items-center py-2 border-bottom"><span><i class="fas fa-bell me-2"></i>Notificações</span><div class="form-check form-switch"><input class="form-check-input" type="checkbox" checked></div></div>
    <hr><button class="btn btn-outline-custom w-100 mb-2" onclick="alert('Alterar senha')">Alterar Senha</button><button class="btn btn-outline-danger w-100" onclick="logout()">Sair</button>
</div>
@endsection
