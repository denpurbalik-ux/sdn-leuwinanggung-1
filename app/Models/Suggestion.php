<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Suggestion extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'type',
        'subject',
        'message',
        'status',
        'response',
        'responded_at',
    ];

    protected $casts = [
        'responded_at' => 'datetime',
    ];
}
