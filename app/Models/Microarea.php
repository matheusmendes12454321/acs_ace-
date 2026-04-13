<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Microarea extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo', 'nome', 'descricao', 'poligono_coordenadas',
        'populacao_estimada', 'residencias_estimadas', 'cobertura_percentual', 'status'
    ];

    public function agentes()
    {
        return $this->hasMany(User::class);
    }

    public function familias()
    {
        return $this->hasMany(Familia::class);
    }
}
