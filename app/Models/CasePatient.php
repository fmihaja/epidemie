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
}
