<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolPayment extends Model
{
    protected $fillable = [
        'student_id',
        'payment_type',
        'period',
        'amount',
        'payment_date',
        'payment_method',
        'receipt_number',
        'status',
        'notes',
    ];

    protected $casts = [
        'payment_date' => 'date',
        'amount' => 'decimal:2',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
