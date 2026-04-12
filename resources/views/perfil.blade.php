@extends('layouts.master')

@section('title', 'Meu Perfil')

@section('content')
<div class="card-custom" style="max-width:500px; margin:0 auto;">
    <div class="text-center"><i class="fas fa-user-circle fa-4x text-primary mb-3"></i><h4>{{ session('user_nome') }}</h4><p class="text-muted small">{{ session('user_funcao') == 'administrador' ? 'Administrador' : (session('user_funcao') == 'acs' ? 'Agente ACS' : 'Agente ACE') }}</p></div>
    <hr><p><i class="fas fa-envelope me-2"></i> {{ session('user_email') }}</p><p><i class="fas fa-phone me-2"></i> (11) 98765-4321</p><button class="btn btn-outline-custom w-100 mt-3" onclick="alert('Editar perfil')">Editar</button>
</div>
@endsection
