<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
=======
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
>>>>>>> main

class Region extends Model
{
    use HasFactory;

<<<<<<< HEAD

    protected $fillable = [
        'name',
        'population',
        'latitude',
        'longitude',
    ];
=======
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

>>>>>>> main
}
