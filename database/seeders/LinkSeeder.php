<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'shoppe' => 'https://shoppe.com',
                'tokopedia' => '#',
                'tiktok' => '#',
                'instagram' => '#'

            ],
        ];
        DB::table('link_medsos')->insert($data);
    }
}
