<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class Fungsi4Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'fungsi_id' => 4,
                'deskripsi' => 'Deskripsi untuk Fungsi 4 di tabel fungsi1',

            ],
        ];
        DB::table('fungsi4')->insert($data);
    }
}
