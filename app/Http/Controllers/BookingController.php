<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;

class BookingController extends Controller
{
    public function index()
    {
        $room = [
            [
                "id" => 1,
                "name" => "AREA RUANG TAMU",
                "seat" => 5,
                "booked" => 0,
                "isMustFullBooking" => false,
                "times" => [
                    [
                        "id" => 1,
                        "time" => "09.00 - 11.00 WIB",
                    ],
                    [
                        "id" => 2,
                        "time" => "13.00 - 15.00 WIB",
                    ],
                ]
            ],
            [
                "id" => 2,
                "name" => "CO WORKING SPACE",
                "seat" => 6,
                "booked" => 3,
                "isMustFullBooking" => false,
                "times" => [
                    [
                        "id" => 1,
                        "time" => "09.00 - 11.00 WIB",
                    ],
                    [
                        "id" => 2,
                        "time" => "13.00 - 15.00 WIB",
                    ],
                ]
            ],
            [
                "id" => 3,
                "name" => "BASECAMP MILENIAL",
                "seat" => 12,
                "booked" => 0,
                "isMustFullBooking" => false,
                "times" => [
                    [
                        "id" => 1,
                        "time" => "09.00 - 11.00 WIB",
                    ],
                    [
                        "id" => 2,
                        "time" => "13.00 - 15.00 WIB",
                    ],
                ]
            ],
            [
                "id" => 4,
                "name" => "AREA DISPLAY PRODUK",
                "seat" => 6,
                "booked" => 0,
                "isMustFullBooking" => false,
                "times" => [
                    [
                        "id" => 1,
                        "time" => "09.00 - 11.00 WIB",
                    ],
                    [
                        "id" => 2,
                        "time" => "13.00 - 15.00 WIB",
                    ],
                ]
            ],
            [
                "id" => 5,
                "name" => "FRONT OFFICE",
                "seat" => 3,
                "booked" => 0,
                "isMustFullBooking" => false,
                "times" => [
                    [
                        "id" => 1,
                        "time" => "09.00 - 11.00 WIB",
                    ],
                    [
                        "id" => 2,
                        "time" => "13.00 - 15.00 WIB",
                    ],
                ]
            ],
            [
                "id" => 6,
                "name" => "RUANG PODCAST",
                "seat" => 6,
                "booked" => 0,
                "isMustFullBooking" => true,
                "times" => [
                    [
                        "id" => 1,
                        "time" => "09.00 - 11.00 WIB",
                    ],
                    [
                        "id" => 2,
                        "time" => "13.00 - 15.00 WIB",
                    ],
                ]
            ],
            [
                "id" => 7,
                "name" => "MINI STUDIO",
                "seat" => 10,
                "booked" => 0,
                "isMustFullBooking" => true,
                "times" => [
                    [
                        "id" => 1,
                        "time" => "09.00 - 11.00 WIB",
                    ],
                    [
                        "id" => 2,
                        "time" => "13.00 - 15.00 WIB",
                    ],
                ]
            ],
            [
                "id" => 8,
                "name" => "RUANG PELATIHAN",
                "seat" => 20,
                "booked" => 0,
                "isMustFullBooking" => false,
                "times" => [
                    [
                        "id" => 1,
                        "time" => "09.00 - 11.00 WIB",
                    ],
                    [
                        "id" => 2,
                        "time" => "13.00 - 15.00 WIB",
                    ],
                ]
            ],
            [
                "id" => 9,
                "name" => "SMART OFFICE",
                "seat" => 3,
                "booked" => 0,
                "isMustFullBooking" => false,
                "times" => [
                    [
                        "id" => 1,
                        "time" => "09.00 - 11.00 WIB",
                    ],
                    [
                        "id" => 2,
                        "time" => "13.00 - 15.00 WIB",
                    ],
                ]
            ],
        ];

        return view('frontend.booking', [
            "room" => $room
        ]);
    }

    public function store(Request $req){
        $req->validate([
            'jumlah_kursi' => 'required|numeric|max:' . $req->kursi_ready,
            'name' => 'required',
            'whatsapp' => 'required',
            'tujuan' => 'required',
            'g-recaptcha-response' => 'required|captcha',
        ], [
            'jumlah_kursi.required' => 'Isi kolom yang diperlukan.',
            'jumlah_kursi.max' => 'Jumlah kursi yang tersedia hanya ' . $req->kursi_ready,
            'name.required' => 'Isi kolom yang diperlukan.',
            'whatsapp.required' => 'Isi kolom yang diperlukan.',
            'tujuan.required' => 'Isi kolom yang diperlukan.',
            'g-recaptcha-response.required' => 'Konfirmasi captcha diatas.',
        ]);

        $data = [
            "room_id" => $req->room_id,
            "booking_time" => $req->room_time,
            "booking_seat" => $req->jumlah_kursi,
            "booking_name" => $req->name,
            "whatsapp" => $req->whatsapp,
            "purpose" => $req->tujuan,
        ];

        return redirect(route('booking.success') . "?room=" . $req->room_name . "&time=" . "13.00 - 15.00 WIB");
    }

    public function success(Request $req){
        return view('frontend.booking_success', [
            "room" => $req->room,
            "time" => $req->time,
        ]);
    }
}
