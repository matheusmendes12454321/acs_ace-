<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sincronizacao extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'tabela', 'registro_id', 'operacao',
        'dados', 'status', 'erro_mensagem', 'tentativas', 'sincronizado_em'
    ];

    protected $casts = [
        'dados' => 'array',
        'sincronizado_em' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
