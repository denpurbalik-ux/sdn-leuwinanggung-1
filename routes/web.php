<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\ProgramController;
use App\Models\Slider;
use App\Models\SchoolProfile;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    $sliders = Slider::where('is_active', true)
        ->orderBy('sort_order')
        ->get()
        ->map(function ($slider) {
            return [
                'id' => $slider->id,
                'title' => $slider->title,
                'description' => $slider->description,
                'button_text' => $slider->button_text,
                'button_link' => $slider->button_link,
                'image_path' => $slider->image_path ? asset('storage/' . $slider->image_path) : null,
            ];
        });

    return Inertia::render('Home', [
        'sliders' => $sliders,
    ]);
});

Route::get('/profil', function () {
    $schoolProfiles = SchoolProfile::where('is_active', true)
        ->orderBy('sort_order')
        ->get()
        ->groupBy('section')
        ->map(function ($items) {
            return $items->map(function ($item) {
                return [
                    'id' => $item->id,
                    'title' => $item->title,
                    'content' => $item->content,
                    'image_path' => $item->image_path ? asset('storage/' . $item->image_path) : null,
                ];
            });
        });

    return Inertia::render('Profile', [
        'schoolProfiles' => $schoolProfiles,
    ]);
});

Route::get('/program', [ProgramController::class, 'index']);
Route::get('/program/{slug}', [ProgramController::class, 'show']);

Route::get('/fasilitas', [FacilityController::class, 'index']);

Route::get('/kontak', [ContactController::class, 'index']);
