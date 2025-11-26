<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::where('is_active', true)
            ->orderBy('sort_order')
            ->get()
            ->map(function ($contact) {
                return [
                    'id' => $contact->id,
                    'label' => $contact->label,
                    'value' => $contact->value,
                    'icon' => $contact->icon,
                    'type' => $contact->type,
                    'link' => $contact->link,
                    'map_embed_url' => $contact->map_embed_url,
                ];
            });

        // Footer data sudah di-share global via AppServiceProvider
        // Jadi tidak perlu dikirim lagi di sini
        
        return Inertia::render('Kontak', [
            'contacts' => $contacts,
        ]);
    }
}
