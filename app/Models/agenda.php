<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class agenda extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'number',
        'pc',
        'colony',
        'city',
        'state',
        'phone',
        'email',
        'lat',
        'long'
    ];
}
