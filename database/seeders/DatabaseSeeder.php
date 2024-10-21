<?php

namespace Database\Seeders;

use App\Models\FungsiRB;
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
        User::factory()->create([
            'name' => 'Second Administrator',
            'email' => 'admin2@example.com',
        ]);

        $this->call([
            ProductCategorySeeder::class,
            EventSeeder::class,

            FungsiRBSeeder::class,
            MitraSeeder::class
        ]);
    }
}
