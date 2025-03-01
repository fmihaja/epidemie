<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
=======
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
>>>>>>> main

class Disease extends Model
{
    use HasFactory;
<<<<<<< HEAD
=======

>>>>>>> main
    protected $fillable=[
        'name',
        'pathogene',
        'transmissions',
        'incubation'
    ];

    public function regions(): BelongsToMany
    {
        return $this->belongsToMany(Region::class);
    }
}
