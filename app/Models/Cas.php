<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Cas extends Model
{

    use HasFactory;

    protected $fillable=[
        'dateDiagnosis',
        'status',
        'symptomes',
        'patient_id',
        'disease_id'
    ];

    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }

    public function disease(): BelongsTo
    {
        return $this->belongsTo(Disease::class);
    }




}
