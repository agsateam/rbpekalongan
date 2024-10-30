<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class FungsiRBSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama_fungsi' => 'PENGEMBANGAN UMKM',
                'deskripsi' => 'Rumah BUMN berperan dalam membina UMKM, GO MODERN (Registrasi UMKM). GO DIGITAL (Menggunakan Sosial Media), GO ONLINE (Menggunakan Marketplace / E-Commerce), dan GO GLOBAL (UMKM Siap Export)',

            ],
            [
                'nama_fungsi' => 'BASECAMP MILENIAL',
                'deskripsi' => 'Rumah BUMN berperan dalam mengelola, mendidik, dan membimbing Millenials untuk menjadi entrepreneurs. Millennials adalah lokomotif kemjauan Indonesia',

            ],
            [
                'nama_fungsi' => 'COWORKING SPACE',
                'deskripsi' => 'Rumah BUMN berperan menjadi tempat berkumpulnya Komunitas UMKM dan Millenials untuk belajar dan sharing bisnis dengan dukungan akses internet',

            ],
            [
                'nama_fungsi' => 'INFORMASI TANGGAP BENCANA',
                'deskripsi' => 'Deskripsi INFORMASI TANGGAP BENCANA',

            ],
            [
                'nama_fungsi' => 'PENYALURAN PK/BL & KUR',
                'deskripsi' => 'Deskripsi PENYALURAN PK/BL & KUR',

            ],
        ];
        DB::table('fungsi_rbs')->insert($data);
    }
}
