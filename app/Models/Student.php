<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'nisn',
        'name',
        'gender',
        'birth_place',
        'birth_date',
        'grade',
        'class',
        'address',
        'parent_name',
        'parent_phone',
        'entry_year',
        'status',
        'photo',
    ];

    protected $casts = [
        'birth_date' => 'date',
        'entry_year' => 'date',
    ];

    public function achievements()
    {
        return $this->hasMany(StudentAchievement::class);
    }

    public function payments()
    {
        return $this->hasMany(SchoolPayment::class);
    }
}
