<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Familia extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo_familiar', 'nome_responsavel', 'cpf_responsavel', 'endereco',
        'numero', 'complemento', 'bairro', 'cidade', 'cep', 'latitude', 'longitude',
        'numero_integrantes', 'possui_gestante', 'possui_idoso', 'possui_hipertenso',
        'possui_diabetico', 'possui_crianca', 'observacoes', 'risco',
        'microarea_id', 'user_id', 'ultima_visita'
    ];

    protected $casts = [
        'possui_gestante' => 'boolean',
        'possui_idoso' => 'boolean',
        'possui_hipertenso' => 'boolean',
        'possui_diabetico' => 'boolean',
        'possui_crianca' => 'boolean',
        'ultima_visita' => 'datetime',
    ];

    public function microarea()
    {
        return $this->belongsTo(Microarea::class);
    }

    public function agente()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function visitas()
    {
        return $this->hasMany(Visita::class);
    }

    public function alertas()
    {
        return $this->hasMany(Alerta::class);
    }
}
