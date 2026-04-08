<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('layouts.app');
});

Route::get('/familias', function () {
    return view('layouts.app');
});

Route::get('/visitas', function () {
    return view('layouts.app');
});

Route::get('/focos', function () {
    return view('layouts.app');
});

Route::get('/rotas', function () {
    return view('layouts.app');
});

Route::get('/alertas', function () {
    return view('layouts.app');
});

Route::get('/relatorios', function () {
    return view('layouts.app');
});

Route::get('/historico', function () {
    return view('layouts.app');
});

Route::get('/perfil', function () {
    return view('layouts.app');
});
