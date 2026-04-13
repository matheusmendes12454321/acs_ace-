<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Alerta extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo', 'descricao', 'tipo', 'prioridade', 'status',
        'user_id', 'familia_id', 'foco_id', 'endereco',
        'latitude', 'longitude', 'responsavel_id', 'resolvido_em', 'solucao'
    ];

    protected $casts = [
        'resolvido_em' => 'datetime',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function familia()
    {
        return $this->belongsTo(Familia::class);
    }

    public function foco()
    {
        return $this->belongsTo(FocoEndemia::class, 'foco_id');
    }

    public function responsavel()
    {
        return $this->belongsTo(User::class, 'responsavel_id');
    }
}
