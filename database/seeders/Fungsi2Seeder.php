<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Fungsi2Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'fungsi_id' => 2,
                'deskripsi' => 'Deskripsi untuk Fungsi 2 di tabel fungsi1',

            ],
        ];
        DB::table('fungsi2')->insert($data);
    }
}