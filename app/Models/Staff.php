<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $fillable = [
        'nip',
        'name',
        'gender',
        'phone',
        'email',
        'address',
        'position',
        'education',
        'join_date',
        'status',
        'photo',
    ];

    protected $casts = [
        'join_date' => 'date',
    ];
}
