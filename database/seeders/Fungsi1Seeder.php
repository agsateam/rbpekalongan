<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Fungsi1Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'fungsi_id' => 1, // Berelasi dengan fungsi_id dari tabel 'fungsi'
                'deskripsi' => 'Deskripsi untuk Fungsi A di tabel fungsi1',

            ],
        ];
        DB::table('fungsi1')->insert($data);
    }
}
