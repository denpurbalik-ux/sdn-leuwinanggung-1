<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('published_at', 'desc')
            ->get()
            ->map(function ($program) {
                return [
                    'id' => $program->id,
                    'title' => $program->title,
                    'slug' => $program->slug,
                    'description' => $program->description,
                    'image' => asset('storage/' . $program->image_path),
                    'is_featured' => $program->is_featured,
                    'published_at' => $program->published_at->format('d M Y'),
                ];
            });

        return Inertia::render('Program', [
            'programs' => $programs,
        ]);
    }

    public function show($slug)
    {
        $program = Program::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        return Inertia::render('ProgramDetail', [
            'program' => [
                'id' => $program->id,
                'title' => $program->title,
                'slug' => $program->slug,
                'description' => $program->description,
                'content' => $program->content,
                'image' => asset('storage/' . $program->image_path),
                'is_featured' => $program->is_featured,
                'published_at' => $program->published_at->format('d M Y H:i'),
            ],
        ]);
    }
}
