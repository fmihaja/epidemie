<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Disease extends Model
{
    use HasFactory;

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
