<?php

namespace App\Http\Controllers;

use App\Models\BookingRoom;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;

class BookingController extends Controller
{
    public function index()
    {
        $room = BookingRoom::where('open_booking', true)->with('times')->get();

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

        return redirect(route('booking.success') . "?room=" . $req->room_name . "&time=" . $req->room_time);
    }

    public function success(Request $req){
        return view('frontend.booking_success', [
            "room" => $req->room,
            "time" => $req->time,
        ]);
    }
}
