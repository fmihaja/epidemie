<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cas extends Model
{
    
    use HasFactory;

    protected $fillable=[
        'dateDiagnosis',
        'status',
        'symptomes'
    ];

    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class, 'id_patient');
    }

    public function disease(): BelongsTo
    {
        return $this->belongsTo(Disease::class, 'id_patient');
    }


}
