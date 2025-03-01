<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;
    
    protected $fillable=[
        'name',
        'lat',
        'long',
        'population'
    ];

    public function disease(): BelongsToMany
    {
        return $this->belongsToMany(Disease::class);
    }
}
