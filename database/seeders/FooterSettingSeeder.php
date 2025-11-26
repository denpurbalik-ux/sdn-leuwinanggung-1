<?php

namespace Database\Seeders;

use App\Models\FooterSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FooterSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FooterSetting::create([
            'about_text' => 'SD Negeri Leuwinanggung 1 adalah sekolah dasar negeri yang berkomitmen memberikan pendidikan berkualitas untuk generasi masa depan.',
            'copyright_text' => '© 2025 SD Negeri Leuwinanggung 1. All Rights Reserved.',
            'is_active' => true,
        ]);
    }
}
