<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use Illuminate\Http\Request;
use Inertia\Inertia;

class FacilityController extends Controller
{
    public function index()
    {
        $facilities = Facility::where('is_active', true)
            ->orderBy('sort_order')
            ->get()
            ->map(function ($facility) {
                return [
                    'id' => $facility->id,
                    'name' => $facility->name,
                    'description' => $facility->description,
                    'icon' => $facility->icon,
                    'image_path' => $facility->image_path ? asset('storage/' . $facility->image_path) : null,
                ];
            });

        return Inertia::render('Fasilitas', [
            'facilities' => $facilities,
        ]);
    }
}
