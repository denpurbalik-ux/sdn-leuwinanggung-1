<?php

namespace Database\Seeders;

use App\Models\SchoolProfile;
use Illuminate\Database\Seeder;

class SchoolProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $profiles = [
            [
                'section' => 'visi',
                'title' => 'Visi Sekolah',
                'content' => '<p>Menjadi lembaga pendidikan unggulan yang mencetak generasi muslim berkualitas, berakhlak mulia, dan menguasai teknologi informasi dan komunikasi.</p>',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'section' => 'misi',
                'title' => 'Misi Sekolah',
                'content' => '<ul><li>Menyelenggarakan pendidikan berbasis nilai-nilai Islam</li><li>Mengembangkan kompetensi siswa dalam teknologi informasi</li><li>Membentuk karakter siswa yang berakhlak mulia</li><li>Menyiapkan lulusan yang mampu bersaing di era digital</li></ul>',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'section' => 'tentang',
                'title' => 'Tentang SD Negeri Leuwinanggung 1',
                'content' => '<p>SD Negeri Leuwinanggung 1 adalah sekolah dasar negeri yang berkomitmen untuk memberikan pendidikan berkualitas dengan mengintegrasikan nilai-nilai karakter, teknologi, dan pembelajaran yang menyenangkan.</p><p>Berlokasi strategis dengan fasilitas modern, kami terus berinovasi dalam metode pembelajaran untuk menghasilkan generasi yang cerdas, kreatif, dan berakhlak mulia.</p>',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'section' => 'sejarah',
                'title' => 'Sejarah Sekolah',
                'content' => '<p>SD Negeri Leuwinanggung 1 didirikan pada tahun 1975 sebagai bagian dari upaya pemerintah dalam menyediakan akses pendidikan bagi seluruh masyarakat.</p><p>Selama hampir 5 dekade, sekolah ini telah menghasilkan ribuan alumni yang sukses di berbagai bidang dan terus berkembang mengikuti perkembangan zaman.</p>',
                'sort_order' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($profiles as $profile) {
            SchoolProfile::create($profile);
        }
    }
}
