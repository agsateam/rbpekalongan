<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class Fungsi5Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'fungsi_id' => 5,
                'deskripsi' => 'Deskripsi untuk Fungsi 5 di tabel fungsi1',

            ],
        ];
        DB::table('fungsi5')->insert($data);
    }
}
