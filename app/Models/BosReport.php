<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BosReport extends Model
{
    protected $fillable = [
        'period',
        'transaction_date',
        'type',
        'category',
        'description',
        'amount',
        'receipt_number',
        'attachment',
        'notes',
    ];

    protected $casts = [
        'transaction_date' => 'date',
        'amount' => 'decimal:2',
    ];
}
