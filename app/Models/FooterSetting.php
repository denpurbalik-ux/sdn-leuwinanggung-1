<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'logo_path',
        'logo_name',
        'about_text',
        'copyright_text',
        'map_embed_url',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
