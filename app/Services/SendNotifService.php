<?php

namespace App\Services;

use App\Models\BookingRoom;
use App\Models\BookingTime;
use App\Models\Event;
use App\Models\NotificationLog;
use App\Models\WebContent;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class SendNotifService
{
    const EVENT_TEMPLATE = "Notifikasi Pendaftaran Event\n\nEvent : ?\nNama Pendaftar : ?\nGender : ?\nUmur : ?\nNomor WA : ?\n\nSilahkan verifikasi pendaftaran di dashboard admin.\nhttps://rbpekalongan.id/manage-event/regist";
    const BOOKING_TEMPLATE = "Notifikasi Booking Tempat\n\nTempat : ?\nWaktu : ?\nJumlah Kursi : ?\nNama : ?\nNomor WA : ?\nTujuan : ?\n\nSelengkapnya, cek di dashboard admin.\nhttps://rbpekalongan.id/manage-booking";

    public static function notifEvent($data){
        $event = Event::find($data["event_id"])->name;
        $gender = $data["gender"] == "lk" ? "Laki-laki" : "Perempuan";
        
        $message = Str::replaceArray("?", [$event, $data["name"], $gender, $data["age"], $data["phone"]], self::EVENT_TEMPLATE);
        $adminNumber = WebContent::find(1)->whatsapp_notif;

        $response = self::send($message, $adminNumber);
        if ($response) {
            NotificationLog::create([
                "send_for" => "Event Regist Notif",
                "to" => "Admin - " . $adminNumber,
                "success" => true,
            ]);
        } else {
            NotificationLog::create([
                "send_for" => "Event Regist Notif",
                "to" => "Admin - " . $adminNumber,
                "success" => false,
            ]);
        }
    }

    public static function notifBooking($data){
        $room = BookingRoom::find($data["booking_room_id"])->name;
        $time = BookingTime::find($data["booking_time_id"]);
        $time = $time->open ." - ". $time->close;
        
        $message = Str::replaceArray("?", [$room, $time, $data["booking_seat"], $data["name"], $data["whatsapp"], $data["purpose"]], self::BOOKING_TEMPLATE);
        $adminNumber = WebContent::find(1)->whatsapp_notif;

        $response = self::send($message, $adminNumber);
        if ($response) {
            NotificationLog::create([
                "send_for" => "Booking Notif",
                "to" => "Admin - " . $adminNumber,
                "success" => true,
            ]);
        } else {
            NotificationLog::create([
                "send_for" => "Booking Notif",
                "to" => "Admin - " . $adminNumber,
                "success" => false,
            ]);
        }
    }



    // This func for call wa gateway service
    private static function send($message, $adminNumber)
    {
        $data = [
            'appkey' => env("WA_APPKEY"),
            'authkey' => env("WA_AUTHKEY"),
            'to' => $adminNumber,
            'message' => $message,
            'sandbox' => 'false'
        ];
        
        try {
            $response = Http::post(env("WA_ENDPOINT"), $data);
            
            if ($response->successful()) {
                return true;
            }else{
                return false;
            }
        } catch (\Throwable $th) {
            return false;
        }
    }
}