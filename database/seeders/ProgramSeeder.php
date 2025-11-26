<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $programs = [
            [
                'title' => 'Pendidikan Karakter',
                'slug' => 'pendidikan-karakter',
                'description' => 'Program pembentukan karakter siswa melalui kegiatan pembiasaan dan keteladanan yang dilakukan secara konsisten setiap hari.',
                'content' => '<h2>Program Pendidikan Karakter</h2><p>Program pendidikan karakter di SD Negeri Leuwinanggung 1 dirancang khusus untuk membentuk pribadi siswa yang berakhlak mulia. Program ini meliputi:</p><ul><li><strong>Pembiasaan Sholat Berjamaah</strong> - Dilaksanakan setiap hari untuk siswa muslim</li><li><strong>Baca Tulis Al-Quran</strong> - Program tambahan untuk meningkatkan kemampuan membaca Al-Quran</li><li><strong>Pendidikan Budi Pekerti</strong> - Melalui cerita inspiratif dan contoh teladan</li><li><strong>Gotong Royong</strong> - Kegiatan kerja bakti dan kebersihan bersama</li></ul><p>Program ini telah terbukti memberikan dampak positif dalam pembentukan karakter siswa yang sopan, santun, dan bertanggung jawab.</p>',
                'image_path' => 'image/program.webp',
                'is_featured' => true,
                'is_active' => true,
                'published_at' => now(),
                'sort_order' => 1,
            ],
            [
                'title' => 'Literasi Digital',
                'slug' => 'literasi-digital',
                'description' => 'Pembelajaran teknologi informasi dan literasi digital sejak dini untuk mempersiapkan siswa menghadapi era digital.',
                'content' => '<h2>Program Literasi Digital</h2><p>Di era digital saat ini, kemampuan literasi digital menjadi sangat penting. Program literasi digital kami mencakup:</p><ul><li><strong>Pengenalan Komputer Dasar</strong> - Mulai dari cara menggunakan mouse, keyboard, dan aplikasi dasar</li><li><strong>Internet Sehat dan Aman</strong> - Edukasi tentang penggunaan internet yang bijak dan aman</li><li><strong>Aplikasi Pembelajaran</strong> - Penggunaan aplikasi edukatif untuk mendukung pembelajaran</li><li><strong>Coding untuk Anak</strong> - Pengenalan dasar pemrograman melalui permainan yang menyenangkan</li></ul><p>Program ini dilaksanakan di laboratorium komputer dengan peralatan yang memadai dan instruktur yang berpengalaman.</p>',
                'image_path' => 'image/program2.png',
                'is_featured' => true,
                'is_active' => true,
                'published_at' => now()->subDays(5),
                'sort_order' => 2,
            ],
            [
                'title' => 'Ekstrakurikuler Beragam',
                'slug' => 'ekstrakurikuler-beragam',
                'description' => 'Berbagai kegiatan ekstrakurikuler untuk mengembangkan bakat dan minat siswa sesuai dengan potensi masing-masing.',
                'content' => '<h2>Program Ekstrakurikuler</h2><p>SD Negeri Leuwinanggung 1 menyediakan berbagai pilihan ekstrakurikuler untuk mengembangkan potensi siswa:</p><h3>Ekstrakurikuler Olahraga:</h3><ul><li><strong>Sepak Bola</strong> - Tim sepak bola sekolah yang aktif mengikuti kompetisi</li><li><strong>Badminton</strong> - Olahraga favorit siswa dengan prestasi yang membanggakan</li><li><strong>Pencak Silat</strong> - Seni bela diri tradisional Indonesia</li></ul><h3>Ekstrakurikuler Seni:</h3><ul><li><strong>Tari Tradisional</strong> - Melestarikan budaya daerah melalui tarian</li><li><strong>Musik dan Paduan Suara</strong> - Mengasah bakat di bidang musik</li><li><strong>Menggambar dan Melukis</strong> - Mengembangkan kreativitas seni rupa</li></ul><h3>Ekstrakurikuler Akademik:</h3><ul><li><strong>Olimpiade Sains</strong> - Persiapan kompetisi matematika dan IPA</li><li><strong>English Club</strong> - Meningkatkan kemampuan bahasa Inggris</li></ul>',
                'image_path' => 'image/program3.jpg',
                'is_featured' => false,
                'is_active' => true,
                'published_at' => now()->subDays(10),
                'sort_order' => 3,
            ],
            [
                'title' => 'Program Literasi Baca Tulis',
                'slug' => 'program-literasi-baca-tulis',
                'description' => 'Program khusus untuk meningkatkan kemampuan membaca dan menulis siswa melalui berbagai kegiatan yang menyenangkan.',
                'content' => '<h2>Program Literasi Baca Tulis</h2><p>Program ini dirancang khusus untuk meningkatkan minat baca dan kemampuan menulis siswa. Kegiatan yang dilaksanakan meliputi:</p><ul><li><strong>Pojok Baca di Setiap Kelas</strong> - Menyediakan buku-buku menarik di setiap ruang kelas</li><li><strong>Kunjungan ke Perpustakaan</strong> - Jadwal rutin kunjungan ke perpustakaan sekolah</li><li><strong>Story Telling</strong> - Kegiatan bercerita untuk meningkatkan imajinasi</li><li><strong>Kompetisi Menulis</strong> - Lomba menulis cerita pendek dan puisi</li><li><strong>Reading Challenge</strong> - Tantangan membaca buku dengan sistem reward</li></ul><p>Program ini telah meningkatkan minat baca siswa secara signifikan dan memberikan dampak positif pada kemampuan akademik secara keseluruhan.</p>',
                'image_path' => 'image/program.webp',
                'is_featured' => false,
                'is_active' => true,
                'published_at' => now()->subDays(15),
                'sort_order' => 4,
            ],
        ];

        foreach ($programs as $program) {
            \App\Models\Program::create($program);
        }
    }
}
