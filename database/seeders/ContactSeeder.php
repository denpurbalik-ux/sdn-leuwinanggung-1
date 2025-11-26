<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contacts = [
            [
                'label' => 'Alamat',
                'value' => 'Jl. Raya Leuwinanggung, Leuwinanggung, Kec. Tapos, Kota Depok, Jawa Barat 16956',
                'icon' => '📍',
                'type' => 'address',
                'link' => 'https://maps.google.com/?q=SD+Negeri+Leuwinanggung+1',
                'map_embed_url' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.5555!2d106.8742!3d-6.4156!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwMjQnNTYuMiJTIDEwNsKwNTInMjcuMSJF!5e0!3m2!1sen!2sid!4v1620000000000!5m2!1sen!2sid',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'label' => 'Telepon',
                'value' => '(021) 87903xxx',
                'icon' => '📞',
                'type' => 'phone',
                'link' => 'tel:02187903xxx',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'label' => 'Email',
                'value' => 'info@sdnleuwinanggung1.sch.id',
                'icon' => '📧',
                'type' => 'email',
                'link' => 'mailto:info@sdnleuwinanggung1.sch.id',
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'label' => 'Jam Operasional',
                'value' => "Senin-Jumat: 07.00 - 14.00 WIB\nSabtu: 07.00 - 11.00 WIB",
                'icon' => '🕐',
                'type' => 'hours',
                'link' => null,
                'is_active' => true,
                'sort_order' => 4,
            ],
        ];

        foreach ($contacts as $contact) {
            Contact::create($contact);
        }
    }
}
