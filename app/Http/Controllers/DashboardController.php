<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function admin()
    {
        $stats = [
            'total_agentes' => 12,
            'total_familias' => 142,
            'total_focos' => 24,
            'total_visitas' => 1248,
            'cobertura' => 94.2,
            'alertas_criticos' => 8
        ];
        return view('admin.dashboard', compact('stats'));
    }

    public function acs()
    {
        $stats = [
            'meta_mensal' => 84,
            'visitas_realizadas' => 168,
            'meta_total' => 200,
            'economia_rota' => 12.4,
            'alertas' => 3
        ];
        return view('acs.dashboard', compact('stats'));
    }

    public function ace()
    {
        $stats = [
            'focos_ativos' => 124,
            'vistorias_hoje' => 48,
            'alto_risco' => 8,
            'eliminados_mes' => 142
        ];
        return view('ace.dashboard', compact('stats'));
    }
}
