@extends('layouts.master')
@section('title', 'Perfil')
@section('content')
<div class="card-custom"><h3>Meu Perfil</h3><p>Nome: {{ session('user_nome') }}</p><p>Email: {{ session('user_email') }}</p><p>Tipo: {{ session('user_funcao') }}</p></div>
@endsection
