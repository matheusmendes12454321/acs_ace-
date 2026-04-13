<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vistoria extends Model
{
    use HasFactory;

    protected $fillable = [
        'foco_id', 'endereco', 'bairro', 'latitude', 'longitude',
        'data_vistoria', 'resultado', 'descricao', 'foto_path',
        'user_id', 'acoes_realizadas', 'sincronizado'
    ];

    protected $casts = [
        'data_vistoria' => 'date',
        'sincronizado' => 'boolean',
    ];

    public function foco()
    {
        return $this->belongsTo(FocoEndemia::class, 'foco_id');
    }

    public function agente()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
