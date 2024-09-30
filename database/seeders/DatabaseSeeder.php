<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Administrator',
            'email' => 'admin@example.com',
        ]);

        $this->call([
            ProductCategorySeeder::class,
            // EventSeeder::class
            FungsiSeeder::class,
            Fungsi1Seeder::class,
            Fungsi2Seeder::class,
            Fungsi3Seeder::class,
            Fungsi4Seeder::class,
            Fungsi5Seeder::class,

        ]);
    }
}
