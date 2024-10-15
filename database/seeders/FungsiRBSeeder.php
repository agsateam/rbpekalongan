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
                'deskripsi' => 'Deskripsi Pengembangan UMKM',

            ],
            [
                'nama_fungsi' => 'BASECAMP MILENIAL',
                'deskripsi' => 'Deskripsi BASECAMP MILENIAL',

            ],
            [
                'nama_fungsi' => 'COWORKING SPACE',
                'deskripsi' => 'Deskripsi COWORKING SPACE',

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
