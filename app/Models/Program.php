<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'content',
        'image_path',
        'is_featured',
        'is_active',
        'published_at',
        'sort_order',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'published_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($program) {
            if (empty($program->slug)) {
                $program->slug = \Illuminate\Support\Str::slug($program->title);
            }
        });
        
        static::updating(function ($program) {
            if ($program->isDirty('title') && empty($program->slug)) {
                $program->slug = \Illuminate\Support\Str::slug($program->title);
            }
        });
    }
}
