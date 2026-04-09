<?php

use Illuminate\Support\Facades\Route;

// ============================================
// ROTA PRINCIPAL - LOGIN
// ============================================
Route::get('/', function () {
    return view('login');
});

Route::get('/login', function () {
    return view('login');
});

// ============================================
// ROTAS ADMIN (Administrador)
// ============================================
Route::get('/admin_dashboard', function () {
    return view('admin_dashboard.index');
});

Route::get('/alertas_adm', function () {
    return view('alertas_adm.index');
});

Route::get('/central_de_alertas_adm', function () {
    return view('central_de_alertas_adm.index');
});

Route::get('/dashboard_geral_admin', function () {
    return view('dashboard_geral_admin.index');
});

Route::get('/gestao_usuarios', function () {
    return view('gestao_usuarios.index');
});

Route::get('/relatorios_adm', function () {
    return view('relatorios_adm.index');
});

Route::get('/relatorios_exporta_adm', function () {
    return view('relatorios_exporta_adm.index');
});

Route::get('/configuração', function () {
    return view('configuração.index');
});

// ============================================
// ROTAS DE GESTÃO
// ============================================
Route::get('/gestão_micro_areas', function () {
    return view('gestão_micro_areas.index');
});

Route::get('/micro_areas', function () {
    return view('micro_areas.index');
});

Route::get('/gestao_pacientes', function () {
    return view('gestao_pacientes.index');
});

// ============================================
// ROTAS DE FAMÍLIAS E VISITAS
// ============================================
Route::get('/familias', function () {
    return view('familias.index');
});

Route::get('/visitas', function () {
    return view('visitas.index');
});

Route::get('/historico', function () {
    return view('historico.index');
});

Route::get('/auditoria_de_visitas', function () {
    return view('auditoria_de_visitas.index');
});

Route::get('/auditoria_visitas', function () {
    return view('auditoria_visitas.index');
});

// ============================================
// ROTAS DE ENDEMIAS E MONITORAMENTO
// ============================================
Route::get('/alertas', function () {
    return view('alertas.index');
});

Route::get('/monitoramento_de_endemias', function () {
    return view('monitoramento_de_endemias.index');
});

Route::get('/monitoramento_endemias', function () {
    return view('monitoramento_endemias.index');
});

// ============================================
// ROTAS DE RELATÓRIOS
// ============================================
Route::get('/relatorios', function () {
    return view('relatorios.index');
});

// ============================================
// ROTA DE SINCRONIZAÇÃO
// ============================================
Route::get('/sicronização', function () {
    return view('sicronização.index');
});

// ============================================
// ROTA PADRÃO PARA PÁGINAS NÃO ENCONTRADAS
// ============================================
Route::fallback(function () {
    return redirect('/');
});
