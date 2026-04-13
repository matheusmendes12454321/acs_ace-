<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FocoEndemia extends Model
{
    use HasFactory;

    protected $table = 'focos_endemias';

    protected $fillable = [
        'codigo_foco', 'endereco', 'numero', 'bairro', 'cidade',
        'latitude', 'longitude', 'tipo', 'risco', 'status',
        'descricao', 'foto_path', 'user_id', 'data_identificacao',
        'data_eliminacao', 'observacoes'
    ];

    protected $casts = [
        'data_identificacao' => 'date',
        'data_eliminacao' => 'date',
    ];

    public function agente()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function vistorias()
    {
        return $this->hasMany(Vistoria::class);
    }

    public function alertas()
    {
        return $this->hasMany(Alerta::class);
    }
}
