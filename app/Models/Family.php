<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    use HasFactory;

    protected $fillable = [
        'street', 'number', 'neighborhood', 'reference_point', 
        'latitude', 'longitude', 'microarea_id'
    ];

    protected $casts = [
        'latitude' => 'decimal:8',
        'longitude' => 'decimal:8'
    ];

    public function microarea()
    {
        return $this->belongsTo(Microarea::class);
    }

    public function members()
    {
        return $this->hasMany(FamilyMember::class);
    }

    public function visits()
    {
        return $this->hasMany(Visit::class);
    }

    public function endemicsFocus()
    {
        return $this->hasMany(EndemicsFocus::class);
    }
}