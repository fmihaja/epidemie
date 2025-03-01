<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactRegion extends Model
{
    use HasFactory;
    protected $fillable =[
        'contact_id',
        'region_id',
    ];
}
