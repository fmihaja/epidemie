<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable=[
        'firstName',
        'name',
        'birthDate',
        'gender',
        // 'healthStatus'
    ];

    public function casesPatients()
    {
        return $this->belongsToMany(CasePatient::class, 'pivot_case_patient', 'patient_id', 'case_patients_id');
    }
}
