<?php

namespace App\Providers;

use App\Models\FooterSetting;
use App\Models\SocialMedia;
use App\Models\Contact;
use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Share footer data with all Inertia pages
        Inertia::share([
            'footer' => function () {
                $footerSetting = FooterSetting::where('is_active', true)->first();
                
                $socialMedia = SocialMedia::where('is_active', true)
                    ->orderBy('sort_order')
                    ->get()
                    ->map(function ($social) {
                        return [
                            'id' => $social->id,
                            'name' => $social->name,
                            'icon' => $social->icon,
                            'url' => $social->url,
                        ];
                    });

                $contacts = Contact::where('is_active', true)
                    ->whereIn('type', ['address', 'phone', 'email'])
                    ->orderBy('sort_order')
                    ->get()
                    ->map(function ($contact) {
                        return [
                            'id' => $contact->id,
                            'label' => $contact->label,
                            'value' => $contact->value,
                            'icon' => $contact->icon,
                            'type' => $contact->type,
                        ];
                    });

                return [
                    'logo_path' => $footerSetting->logo_path ?? null,
                    'logo_name' => $footerSetting->logo_name ?? 'SD Negeri Leuwinanggung 1',
                    'about_text' => $footerSetting->about_text ?? '',
                    'copyright_text' => $footerSetting->copyright_text ?? '© 2025 SD Negeri Leuwinanggung 1. All Rights Reserved.',
                    'map_embed_url' => $footerSetting->map_embed_url ?? null,
                    'social_media' => $socialMedia,
                    'contacts' => $contacts,
                ];
            },
        ]);
    }
}
