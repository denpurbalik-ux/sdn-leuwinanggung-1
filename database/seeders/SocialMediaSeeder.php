<?php

namespace Database\Seeders;

use App\Models\SocialMedia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SocialMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $socialMedia = [
            [
                'name' => 'Facebook',
                'icon' => 'fab fa-facebook-f',
                'url' => 'https://facebook.com/sdnleuwinanggung1',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Twitter',
                'icon' => 'fab fa-twitter',
                'url' => 'https://twitter.com/sdnleuwinanggung1',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'Instagram',
                'icon' => 'fab fa-instagram',
                'url' => 'https://instagram.com/sdnleuwinanggung1',
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'name' => 'YouTube',
                'icon' => 'fab fa-youtube',
                'url' => 'https://youtube.com/@sdnleuwinanggung1',
                'is_active' => true,
                'sort_order' => 4,
            ],
        ];

        foreach ($socialMedia as $social) {
            SocialMedia::create($social);
        }
    }
}
