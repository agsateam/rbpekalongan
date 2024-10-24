<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HeroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'deskripsi' => 'Lorem, ipsum dolor sit amet consectetur adipisicing
                        elit. Harum, ex iusto ducimus culpa distinctio minima corrupti nam, consequuntur quam
                        repellendus accusantium placeat incidunt. Facere odit tenetur soluta voluptatem ea reprehenderit
                        quaerat nostrum accusamus quam assumenda provident distinctio, eaque quidem praesentium?',

            ],
        ];
        DB::table('heroes')->insert($data);
    }
}
