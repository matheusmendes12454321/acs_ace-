<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// Rotas de Login
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

// Rotas Protegidas - Verificação manual
Route::get('/app', function () {
    if (!session('user_nome')) {
        return redirect('/login');
    }
    $funcao = session('user_funcao');
    if ($funcao == 'administrador') return redirect()->route('admin.dashboard');
    if ($funcao == 'acs') return redirect()->route('acs.dashboard');
    return redirect()->route('ace.dashboard');
});

// Rotas Comuns
Route::get('/perfil', function () {
    if (!session('user_nome')) return redirect('/login');
    return view('perfil');
})->name('perfil');

Route::get('/configuracoes', function () {
    if (!session('user_nome')) return redirect('/login');
    return view('configuracoes');
})->name('configuracoes');

// Rotas Admin
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        if (!session('user_nome')) return redirect('/login');
        return view('admin.dashboard');
    })->name('dashboard');
    
    Route::get('/usuarios', function () {
        if (!session('user_nome')) return redirect('/login');
        return view('admin.usuarios');
    })->name('usuarios');
    
    Route::get('/microareas', function () {
        if (!session('user_nome')) return redirect('/login');
        return view('admin.microareas');
    })->name('microareas');
    
    Route::get('/endemias', function () {
        if (!session('user_nome')) return redirect('/login');
        return view('admin.endemias');
    })->name('endemias');
    
    Route::get('/auditoria', function () {
        if (!session('user_nome')) return redirect('/login');
        return view('admin.auditoria');
    })->name('auditoria');
    
    Route::get('/alertas', function () {
        if (!session('user_nome')) return redirect('/login');
        return view('admin.alertas');
    })->name('alertas');
    
    Route::get('/relatorios', function () {
        if (!session('user_nome')) return redirect('/login');
        return view('admin.relatorios');
    })->name('relatorios');
    
    Route::get('/sincronizacao', function () {
        if (!session('user_nome')) return redirect('/login');
        return view('admin.sincronizacao');
    })->name('sincronizacao');
});

// Rotas ACS
Route::prefix('acs')->name('acs.')->group(function () {
    Route::get('/dashboard', function () {
        if (!session('user_nome')) return redirect('/login');
        return view('acs.dashboard');
    })->name('dashboard');
    
    Route::get('/familias', function () {
        if (!session('user_nome')) return redirect('/login');
        return view('acs.familias');
    })->name('familias');
    
    Route::get('/visitas', function () {
        if (!session('user_nome')) return redirect('/login');
        return view('acs.visitas');
    })->name('visitas');
    
    Route::get('/rotas', function () {
        if (!session('user_nome')) return redirect('/login');
        return view('acs.rotas');
    })->name('rotas');
    
    Route::get('/historico', function () {
        if (!session('user_nome')) return redirect('/login');
        return view('acs.historico');
    })->name('historico');
    
    Route::get('/alertas', function () {
        if (!session('user_nome')) return redirect('/login');
        return view('acs.alertas');
    })->name('alertas');
    
    Route::get('/relatorios', function () {
        if (!session('user_nome')) return redirect('/login');
        return view('acs.relatorios');
    })->name('relatorios');
    
    Route::get('/sincronizacao', function () {
        if (!session('user_nome')) return redirect('/login');
        return view('acs.sincronizacao');
    })->name('sincronizacao');
});

// Rotas ACE
Route::prefix('ace')->name('ace.')->group(function () {
    Route::get('/dashboard', function () {
        if (!session('user_nome')) return redirect('/login');
        return view('ace.dashboard');
    })->name('dashboard');
    
    Route::get('/focos', function () {
        if (!session('user_nome')) return redirect('/login');
        return view('ace.focos');
    })->name('focos');
    
    Route::get('/vistorias', function () {
        if (!session('user_nome')) return redirect('/login');
        return view('ace.vistorias');
    })->name('vistorias');
    
    Route::get('/alertas', function () {
        if (!session('user_nome')) return redirect('/login');
        return view('ace.alertas');
    })->name('alertas');
    
    Route::get('/relatorios', function () {
        if (!session('user_nome')) return redirect('/login');
        return view('ace.relatorios');
    })->name('relatorios');
    
    Route::get('/sincronizacao', function () {
        if (!session('user_nome')) return redirect('/login');
        return view('ace.sincronizacao');
    })->name('sincronizacao');
});
