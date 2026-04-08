<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Microarea extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'code', 'boundaries'];

    protected $casts = [
        'boundaries' => 'array'
    ];

    public function families()
    {
        return $this->hasMany(Family::class);
    }

    public function agents()
    {
        return $this->hasMany(User::class);
    }
}