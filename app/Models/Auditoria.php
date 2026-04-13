<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Auditoria extends Model
{
    use HasFactory;

    protected $fillable = [
        'visita_id', 'user_id', 'status', 'observacoes',
        'geolocalizacao_ok', 'biometria_ok', 'documentacao_ok', 'divergencias'
    ];

    protected $casts = [
        'geolocalizacao_ok' => 'boolean',
        'biometria_ok' => 'boolean',
        'documentacao_ok' => 'boolean',
    ];

    public function visita()
    {
        return $this->belongsTo(Visita::class);
    }

    public function auditor()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
