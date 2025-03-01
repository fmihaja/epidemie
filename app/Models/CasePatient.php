<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CasePatient extends Model
{
    use HasFactory;

    protected $fillable=[
        'diagnosis_date',
        'status'
    ];

    public function patients()
    {
        return $this->belongsToMany(Patient::class, 'pivot_case_patient', 'case_patients_id', 'patient_id');
    }
}
