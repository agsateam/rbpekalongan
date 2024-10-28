<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\BookingRoom;
use App\Models\BookingTime;
use App\Models\WebContent;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    public function index()
    {
        $room = BookingRoom::where('open_booking', true)->with('times')->has('times')->get();
        $open = WebContent::select(["open_booking"])->first()->toArray()['open_booking'];

        return view('frontend.booking', [
            "room" => $room,
            "open" => $open,
        ]);
    }

    public function store(Request $req){
        $req->validate([
            'room_time' => 'required',
            'jumlah_kursi' => 'required|numeric|max:' . $req->kursi_ready,
            'name' => 'required',
            'whatsapp' => 'required',
            'tujuan' => 'required',
            'g-recaptcha-response' => 'required|captcha',
        ], [
            'room_time.required' => 'Isi kolom yang diperlukan.',
            'jumlah_kursi.required' => 'Isi kolom yang diperlukan.',
            'jumlah_kursi.max' => 'Jumlah kursi yang tersedia hanya ' . $req->kursi_ready,
            'name.required' => 'Isi kolom yang diperlukan.',
            'whatsapp.required' => 'Isi kolom yang diperlukan.',
            'tujuan.required' => 'Isi kolom yang diperlukan.',
            'g-recaptcha-response.required' => 'Konfirmasi captcha diatas.',
        ]);

        $data = [
            "code" => $this->generateCode($req->room_id, $req->room_time),
            "booking_room_id" => $req->room_id,
            "booking_time_id" => $req->room_time,
            "booking_seat" => $req->jumlah_kursi,
            "name" => $req->name,
            "whatsapp" => $req->whatsapp,
            "purpose" => $req->tujuan,
        ];

        Booking::create($data);
        BookingTime::where('id', $req->room_time)->update([
            "booked" => DB::raw('booked + ' . $req->jumlah_kursi)
        ]);

        return redirect(route('booking.success') . "?code=" . $data['code'] . "&room=" . $req->room_name . "&time=" . $req->room_time);
    }

    public function success(Request $req){
        return view('frontend.booking_success', [
            "code" => $req->code,
            "room" => $req->room,
            "time" => $req->time,
        ]);
    }

    public function checkin(){
        return view('frontend.booking_checkin');
    }

    public function checkinUpdate(Request $req){
        $data = Booking::where('code', "BC" . $req->code)->first();
        
        if($data){
            if($data->check_in == null){
                $data->update([
                    "check_in" => Carbon::now()
                ]);
    
                return back()->with('success', "Check-In Berhasil");
            }else{
                return back()->with('error', "Kode booking tersebut sudah check-in");
            }
        }

        return back()->with('error', "Kode booking tidak valid");
    }


    private function generateCode($room, $time)
    {
        $template = "BC????";

        $date = Carbon::today();
        $lastData = Booking::whereMonth('created_at', $date->format('m'))->whereYear('created_at', $date->format('Y'))->count();
        
        $result = Str::replaceArray("?", [str_pad(($lastData < 1 ? 1 : $lastData), 3, '0', STR_PAD_LEFT), $date->format('dmy'), $room, $time], $template);

        return $result;
    }
}
