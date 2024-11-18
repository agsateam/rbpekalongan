<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisStatistikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id' => 1,
                'jenis_statistik' => 'Go Digital',

            ],
            [
                'id' => 2,
                'jenis_statistik' => 'Go Modern',

            ],
            [
                'id' => 3,
                'jenis_statistik' => 'Go Online',

            ],
            [
                'id' => 4,
                'jenis_statistik' => 'Jumlah Event',

            ],
        ];
        DB::table('jenis_statistiks')->insert($data);
    }
}
