<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// ==================== ROTAS DE LOGIN (SEU CÓDIGO) ====================
Route::get('/', function () {
    return view('auth.login');
})->name('login');

Route::get('/login', function () {
    return view('auth.login');
});

Route::post('/login', function (Request $request) {
    session([
        'user_nome' => explode('@', $request->email)[0],
        'user_email' => $request->email,
        'user_funcao' => $request->funcao
    ]);
    return redirect('/app');
})->name('login.submit');

Route::get('/logout', function () {
    session()->flush();
    return redirect('/login');
})->name('logout');

Route::get('/app', function () {
    if (!session('user_nome')) {
        return redirect('/login');
    }
    $funcao = session('user_funcao');
    if ($funcao == 'administrador') return redirect()->route('admin.dashboard');
    if ($funcao == 'acs') return redirect()->route('acs.dashboard');
    return redirect()->route('ace.dashboard');
});

// ==================== ROTAS COMUNS ====================
Route::get('/perfil', function () {
    return view('perfil');
})->name('perfil');

Route::get('/configuracoes', function () {
    return view('configuracoes');
})->name('configuracoes');

// ==================== ROTAS ADMIN ====================
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () { return view('admin.dashboard'); })->name('dashboard');
    Route::get('/usuarios', function () { return view('admin.usuarios'); })->name('usuarios');
    Route::get('/agentes', function () { return view('admin.agentes'); })->name('agentes');
    Route::get('/agentes-lista', function () { return view('admin.agentes_lista'); })->name('agentes.lista');
    Route::get('/microareas', function () { return view('admin.microareas'); })->name('microareas');
    Route::get('/endemias', function () { return view('admin.endemias'); })->name('endemias');
    Route::get('/auditoria', function () { return view('admin.auditoria'); })->name('auditoria');
    Route::get('/alertas', function () { return view('admin.alertas'); })->name('alertas');
    Route::get('/relatorios', function () { return view('admin.relatorios'); })->name('relatorios');
    Route::get('/sincronizacao', function () { return view('admin.sincronizacao'); })->name('sincronizacao');
});

// ==================== ROTAS ACS ====================
Route::prefix('acs')->name('acs.')->group(function () {
    Route::get('/dashboard', function () { return view('acs.dashboard'); })->name('dashboard');
    Route::get('/familias', function () { return view('acs.familias'); })->name('familias');
    Route::get('/visitas', function () { return view('acs.visitas'); })->name('visitas');
    Route::get('/rotas', function () { return view('acs.rotas'); })->name('rotas');
    Route::get('/historico', function () { return view('acs.historico'); })->name('historico');
    Route::get('/alertas', function () { return view('acs.alertas'); })->name('alertas');
    Route::get('/relatorios', function () { return view('acs.relatorios'); })->name('relatorios');
    Route::get('/sincronizacao', function () { return view('acs.sincronizacao'); })->name('sincronizacao');
});

// ==================== ROTAS ACE ====================
Route::prefix('ace')->name('ace.')->group(function () {
    Route::get('/dashboard', function () { return view('ace.dashboard'); })->name('dashboard');
    Route::get('/focos', function () { return view('ace.focos'); })->name('focos');
    Route::get('/vistorias', function () { return view('ace.vistorias'); })->name('vistorias');
    Route::get('/alertas', function () { return view('ace.alertas'); })->name('alertas');
    Route::get('/relatorios', function () { return view('ace.relatorios'); })->name('relatorios');
    Route::get('/sincronizacao', function () { return view('ace.sincronizacao'); })->name('sincronizacao');
});
