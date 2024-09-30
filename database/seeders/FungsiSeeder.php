<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FungsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['jenis_fungsi' => 'PENGEMBANGAN UMKM'],
            ['jenis_fungsi' => 'BASECAMP MILENIAL'],
            ['jenis_fungsi' => 'COWORKING SPACE'],
            ['jenis_fungsi' => 'INFORMASI TANGGAP BENCANA'],
            ['jenis_fungsi' => 'PENYALURAN PK/BL & KUR'],
        ];

        DB::table('fungsis')->insert($data);
    }
}
