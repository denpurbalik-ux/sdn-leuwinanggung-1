<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Extracurricular extends Model
{
    protected $fillable = [
        'name',
        'description',
        'teacher_id',
        'schedule',
        'location',
        'max_participants',
        'current_participants',
        'status',
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
