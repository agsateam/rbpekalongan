<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class StatistikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'jenis_statistik' => 'Go Digital',
                'jumlah' => 0,
            ],
            [
                'jenis_statistik' => 'Go Modern',
                'jumlah' => 0,
            ],
            [
                'jenis_statistik' => 'Go Online',
                'jumlah' => 0,
            ],
            [
                'jenis_statistik' => 'Jumlah Event',
                'jumlah' => 0,
            ],
        ];
        DB::table('statistiks')->insert($data);
    }
}
