<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Region extends Model
{
    use HasFactory;
    
    protected $fillable=[
        'name',
        'lat',
        'long',
        'population'
    ];

    public function diseases(): BelongsToMany
    {
        return $this->belongsToMany(Disease::class);
    }
}
