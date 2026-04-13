<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name', 'email', 'cpf', 'password', 'funcao', 'microarea_id',
        'telefone', 'coren', 'ativo', 'ultimo_acesso'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'ativo' => 'boolean',
        'ultimo_acesso' => 'datetime',
    ];

    public function microarea()
    {
        return $this->belongsTo(Microarea::class);
    }

    public function visitas()
    {
        return $this->hasMany(Visita::class);
    }

    public function familias()
    {
        return $this->hasMany(Familia::class);
    }

    public function focos()
    {
        return $this->hasMany(FocoEndemia::class);
    }

    public function vistorias()
    {
        return $this->hasMany(Vistoria::class);
    }

    public function alertasAtribuidos()
    {
        return $this->hasMany(Alerta::class, 'responsavel_id');
    }
}
