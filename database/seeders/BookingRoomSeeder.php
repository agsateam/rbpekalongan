<?php

namespace Database\Seeders;

use App\Models\BookingRoom as ModelsBookingRoom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookingRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rooms = [
            [
                "name" => "AREA RUANG TAMU",
                "seat" => 5,
                
                "isMustFullBooking" => false,
            ],
            [
                "name" => "CO WORKING SPACE",
                "seat" => 9,
                
                "isMustFullBooking" => false,
            ],
            [
                "name" => "BASECAMP MILENIAL",
                "seat" => 12,
                
                "isMustFullBooking" => false,
            ],
            [
                "name" => "AREA DISPLAY PRODUK",
                "seat" => 6,
                
                "isMustFullBooking" => false,
            ],
            [
                "name" => "FRONT OFFICE",
                "seat" => 3,
                
                "isMustFullBooking" => false,
            ],
            [
                "name" => "RUANG PODCAST",
                "seat" => 6,
                "isMustFullBooking" => true,
            ],
            [
                "name" => "MINI STUDIO",
                "seat" => 10,
                "isMustFullBooking" => true,
            ],
            [
                "name" => "RUANG PELATIHAN",
                "seat" => 20,
                "isMustFullBooking" => false,
            ],
            [
                "name" => "SMART OFFICE",
                "seat" => 3,
                "isMustFullBooking" => false,
            ],
        ];

        ModelsBookingRoom::insert($rooms);
    }
}
