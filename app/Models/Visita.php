<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Visita extends Model
{
    use HasFactory;

    protected $fillable = [
        'familia_id', 'user_id', 'data_visita', 'hora_inicio', 'hora_fim',
        'status', 'tipo', 'observacoes', 'pressao_arterial', 'peso',
        'temperatura', 'medicacao_entregue', 'vacina_atualizada',
        'latitude', 'longitude', 'sincronizado', 'sincronizado_em'
    ];

    protected $casts = [
        'data_visita' => 'date',
        'medicacao_entregue' => 'boolean',
        'vacina_atualizada' => 'boolean',
        'sincronizado' => 'boolean',
        'sincronizado_em' => 'datetime',
    ];

    public function familia()
    {
        return $this->belongsTo(Familia::class);
    }

    public function agente()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function auditoria()
    {
        return $this->hasOne(Auditoria::class);
    }
}
