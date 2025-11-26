<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentAchievement extends Model
{
    protected $fillable = [
        'student_id',
        'achievement_name',
        'achievement_type',
        'level',
        'rank',
        'achievement_date',
        'organizer',
        'description',
        'certificate',
    ];

    protected $casts = [
        'achievement_date' => 'date',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
