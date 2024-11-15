<?php

namespace Database\Seeders;


use App\Models\User;
use App\Models\WebContent;
use Faker\Provider\Lorem;
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

        WebContent::create(["video_desc" => "Video Profil Rumah BUMN Pekalongan"]);

        $this->call([
            ProductCategorySeeder::class,
            // EventSeeder::class,
            HeroSeeder::class,
            FungsiRBSeeder::class,
            // StatistikSeeder::class,
            BookingRoomSeeder::class,
            LinkSeeder::class
        ]);
    }
}
