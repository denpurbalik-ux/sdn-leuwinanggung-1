<?php

namespace Database\Seeders;

use App\Models\Facility;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $facilities = [
            [
                'name' => 'Ruang Kelas',
                'description' => 'Ruang kelas yang nyaman dan dilengkapi dengan fasilitas pembelajaran modern untuk mendukung proses belajar mengajar yang efektif.',
                'image_path' => 'image/galeri1.jpg',
                'icon' => '🏫',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Perpustakaan',
                'description' => 'Perpustakaan dengan koleksi buku yang lengkap dan ruang baca yang nyaman untuk menumbuhkan minat baca siswa.',
                'image_path' => 'image/galeri2.jpg',
                'icon' => '📚',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'Laboratorium Komputer',
                'description' => 'Lab komputer dengan perangkat modern untuk pembelajaran teknologi informasi dan komunikasi.',
                'image_path' => 'image/galeri3.jpeg',
                'icon' => '💻',
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'name' => 'Lapangan Olahraga',
                'description' => 'Lapangan olahraga yang luas untuk kegiatan pendidikan jasmani dan ekstrakurikuler olahraga.',
                'image_path' => 'image/galeri4.jpg',
                'icon' => '⚽',
                'is_active' => true,
                'sort_order' => 4,
            ],
            [
                'name' => 'Musholla',
                'description' => 'Musholla yang bersih dan nyaman untuk kegiatan ibadah dan pembelajaran pendidikan agama.',
                'image_path' => 'image/galeri5.webp',
                'icon' => '🕌',
                'is_active' => true,
                'sort_order' => 5,
            ],
            [
                'name' => 'Kantin Sekolah',
                'description' => 'Kantin yang bersih dan sehat menyediakan makanan bergizi untuk siswa dan guru.',
                'image_path' => 'image/galeri6.jpg',
                'icon' => '🍽️',
                'is_active' => true,
                'sort_order' => 6,
            ],
        ];

        foreach ($facilities as $facility) {
            Facility::create($facility);
        }
    }
}
