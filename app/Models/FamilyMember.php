<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'family_id', 'full_name', 'birth_date', 'gender', 'cpf', 
        'sus_card', 'risk_groups', 'health_conditions', 'active'
    ];

    protected $casts = [
        'birth_date' => 'date',
        'risk_groups' => 'array',
        'active' => 'boolean'
    ];

    public function family()
    {
        return $this->belongsTo(Family::class);
    }
}