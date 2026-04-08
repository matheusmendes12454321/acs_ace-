<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name', 'cpf', 'password', 'role', 'microarea_id', 'phone', 'active'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'active' => 'boolean',
    ];

    public function microarea()
    {
        return $this->belongsTo(Microarea::class);
    }

    public function visits()
    {
        return $this->hasMany(Visit::class, 'agent_id');
    }

    public function endemicsFocus()
    {
        return $this->hasMany(EndemicsFocus::class, 'agent_id');
    }

    public function alerts()
    {
        return $this->hasMany(Alert::class, 'agent_id');
    }
}