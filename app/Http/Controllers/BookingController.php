<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $room = [
            [
                "id" => 1,
                "name" => "AREA RUANG TAMU",
                "kursi" => 5,
                "booked" => 0,
                "isMustFullBooking" => false
            ],
            [
                "id" => 2,
                "name" => "CO WORKING SPACE",
                "kursi" => 6,
                "booked" => 3,
                "isMustFullBooking" => false
            ],
            [
                "id" => 3,
                "name" => "BASECAMP MILENIAL",
                "kursi" => 12,
                "booked" => 0,
                "isMustFullBooking" => false
            ],
            [
                "id" => 4,
                "name" => "AREA DISPLAY PRODUK",
                "kursi" => 6,
                "booked" => 0,
                "isMustFullBooking" => false
            ],
            [
                "id" => 5,
                "name" => "FRONT OFFICE",
                "kursi" => 3,
                "booked" => 0,
                "isMustFullBooking" => false
            ],
            [
                "id" => 6,
                "name" => "RUANG PODCAST",
                "kursi" => 3,
                "booked" => 0,
                "isMustFullBooking" => true
            ],
            [
                "id" => 7,
                "name" => "MINI STUDIO",
                "kursi" => 3,
                "booked" => 0,
                "isMustFullBooking" => true
            ],
            [
                "id" => 8,
                "name" => "RUANG PELATIHAN",
                "kursi" => 20,
                "booked" => 0,
                "isMustFullBooking" => false
            ],
            [
                "id" => 9,
                "name" => "SMART OFFICE",
                "kursi" => 3,
                "booked" => 0,
                "isMustFullBooking" => false
            ],
        ];

        return view('frontend.booking', [
            "room" => $room
        ]);
    }

    public function store(Request $req){
        dd($req->all());
    }
}
