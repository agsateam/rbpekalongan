<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Statistik;
use App\Models\JenisStatistik;


class StatistikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jenisstatistik = JenisStatistik::all();

        $data = [

            // Go Digital
            [
                'jenis_statistiks_id' => '1',
                'jumlah' => 2,
                'tahun' => 2017
            ],
            [
                'jenis_statistiks_id' => '1',
                'jumlah' => 11,
                'tahun' => 2018
            ],
            [
                'jenis_statistiks_id' => '1',
                'jumlah' => 163,
                'tahun' => 2019
            ],
            [
                'jenis_statistiks_id' => '1',
                'jumlah' => 396,
                'tahun' => 2020
            ],
            [
                'jenis_statistiks_id' => '1',
                'jumlah' => 1133,
                'tahun' => 2021
            ],
            [
                'jenis_statistiks_id' => '1',
                'jumlah' => 941,
                'tahun' => 2022
            ],
            [
                'jenis_statistiks_id' => '1',
                'jumlah' => 390,
                'tahun' => 2023
            ],
            [
                'jenis_statistiks_id' => '1',
                'jumlah' => 481,
                'tahun' => 2024
            ],

            // Go Modern
            [
                'jenis_statistiks_id' => '2',
                'jumlah' => 16,
                'tahun' => 2017
            ],
            [
                'jenis_statistiks_id' => '2',
                'jumlah' => 34,
                'tahun' => 2018
            ],
            [
                'jenis_statistiks_id' => '2',
                'jumlah' => 208,
                'tahun' => 2019
            ],
            [
                'jenis_statistiks_id' => '2',
                'jumlah' => 523,
                'tahun' => 2020
            ],
            [
                'jenis_statistiks_id' => '2',
                'jumlah' => 1220,
                'tahun' => 2021
            ],
            [
                'jenis_statistiks_id' => '2',
                'jumlah' => 942,
                'tahun' => 2022
            ],
            [
                'jenis_statistiks_id' => '2',
                'jumlah' => 400,
                'tahun' => 2023
            ],
            [
                'jenis_statistiks_id' => '2',
                'jumlah' => 480,
                'tahun' => 2024
            ],
            // Go Online

            [
                'jenis_statistiks_id' => '3',
                'jumlah' => 1,
                'tahun' => 2017
            ],
            [
                'jenis_statistiks_id' => '3',
                'jumlah' => 7,
                'tahun' => 2018
            ],
            [
                'jenis_statistiks_id' => '3',
                'jumlah' => 181,
                'tahun' => 2019
            ],
            [
                'jenis_statistiks_id' => '3',
                'jumlah' => 325,
                'tahun' => 2020
            ],
            [
                'jenis_statistiks_id' => '3',
                'jumlah' => 149,
                'tahun' => 2021
            ],
            [
                'jenis_statistiks_id' => '3',
                'jumlah' => 150,
                'tahun' => 2022
            ],
            [
                'jenis_statistiks_id' => '3',
                'jumlah' => 202,
                'tahun' => 2023
            ],
            [
                'jenis_statistiks_id' => '3',
                'jumlah' => 266,
                'tahun' => 2024
            ],
            [
                'jenis_statistiks_id' => '4',
                'jumlah' => 6,
                'tahun' => 2017
            ],

        ];
        DB::table('statistiks')->insert($data);
    }
}
