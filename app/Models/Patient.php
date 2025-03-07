<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Patient extends Model
{
    use HasFactory;
    protected $fillable=[
        'lastname',
        'firstname',
        'birthDate',
        'email',
        'gender'
    ];

    public function cas(): HasMany
    {
        return $this->hasMany(Cas::class);
    }



}
