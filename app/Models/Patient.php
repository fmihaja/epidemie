<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Patient extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'firstName',
        'birthDate',
        'email'
    ];

    public function cas(): HasMany
    {
        return $this->hasMany(Cas::class);
    }



}
