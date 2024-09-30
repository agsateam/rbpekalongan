<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class Fungsi3Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'fungsi_id' => 3,
                'deskripsi' => 'Deskripsi untuk Fungsi 3 di tabel fungsi1',

            ],
        ];
        DB::table('fungsi3')->insert($data);
    }
}
