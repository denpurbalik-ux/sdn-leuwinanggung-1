<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        'nip',
        'name',
        'gender',
        'phone',
        'email',
        'address',
        'position',
        'subject',
        'education',
        'join_date',
        'status',
        'photo',
    ];

    protected $casts = [
        'join_date' => 'date',
    ];

    public function extracurriculars()
    {
        return $this->hasMany(Extracurricular::class);
    }
}
