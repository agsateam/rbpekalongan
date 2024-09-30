<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data =[
            ["name" => "FASHION/BUSANA"],
            ["name" => "MAKANAN/MINUMAN"],
            ["name" => "CRAFT/KERAJINAN TANGAN"],
            ["name" => "JASA"],
            ["name" => "INDUSTRI"],
            ["name" => "PERDAGANGAN"],
            ["name" => "PERTANIAN"],
            ["name" => "PETERNAKAN"],
            ["name" => "PERKEBUNAN"],
            ["name" => "PERIKANAN"],
        ];

        ProductCategory::insert($data);
    }
}
