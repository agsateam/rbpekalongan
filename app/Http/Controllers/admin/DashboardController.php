<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\BookingRoom;
use App\Models\Event;
use App\Models\Fasilitator;
use App\Models\Umkm;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $stats = [
            "upcomingEvent" => Event::where("status", "upcoming")->count(),
            "umkmRegistered" => Umkm::where("status", "join")->count(),
            "bookingRoom" => BookingRoom::count(),
            "facilitators" => Fasilitator::count(),
        ];

        $charts = [
            "bookingYearly" => $this->getBookingByYear(date("Y")),
            "bookingTopRoom" => $this->getBookingTopRoom(date("Y-m")),
            "eventYearly" => $this->getEventByYear(date("Y")),
            "eventTop" => $this->getEventTop(),
        ];

        return view('backend.dashboard', [
            "stats" => $stats,
            "charts" => json_encode($charts),
        ]);
    }


    // Chart
    private function getMonths($year)
    {
        $thisMonth = date("Y") == $year ? intval(date("m")) : 12;
        $months = [];
        for ($i=$thisMonth; $i >= 1; $i--) { 
            array_push($months, [
                "name" => Carbon::createFromDate($year ."-". $i . "-1")->format("M"),
                "date" => Carbon::createFromDate($year ."-". $i . "-1")->format("Y-m")
            ]);
        }

        return $months;
    }

    private function getBookingByYear($year){
        $months = $this->getMonths($year);
        $datas = [];
        foreach (collect($months)->reverse()->values() as $i) {
            $month = Carbon::createFromDate($i["date"]);
            $count = Booking::where("check_in", "!=", null)
                        ->whereMonth("created_at", $month->format("m"))
                        ->whereYear("created_at", $month->format("Y"))
                        ->count();

            array_push($datas, $count);
        }
        
        return [
            "months" => collect($months)->map(function ($i){ return $i["name"]; })->reverse()->values()->toArray(),
            "series" => $datas
        ];
    }

    private function getBookingTopRoom($date){
        $rooms = BookingRoom::all();

        $datas = [];
        $list = [];
        foreach ($rooms as $i) {
            $date = Carbon::createFromDate($date);
            $count = Booking::where("check_in", "!=", null)
                        ->where("booking_room_id", $i->id)
                        ->whereMonth("created_at", $date->format("m"))
                        ->whereYear("created_at", $date->format("Y"))
                        ->count();
            // $count = rand(0, 30);

            array_push($datas, $count);
            array_push($list, [
                "room" => $i->name,
                "count" => $count
            ]);
        }
        
        return [
            "rooms" => collect($rooms)->map(function ($i){ return $i->name; })->values()->toArray(),
            "series" => $datas,
            "list" => $list,
        ];
    }

    private function getEventByYear($year){
        $months = $this->getMonths($year);
        $datas = [];
        foreach (collect($months)->reverse()->values() as $i) {
            $month = Carbon::createFromDate($i["date"]);
            $count = Event::where("status", "done")
                        ->whereMonth("date", $month->format("m"))
                        ->whereYear("date", $month->format("Y"))
                        ->count();

            array_push($datas, $count);
        }
        
        return [
            "months" => collect($months)->map(function ($i){ return $i["name"]; })->reverse()->values()->toArray(),
            "series" => $datas
        ];
    }

    private function getEventTop($year = null){
        $events = Event::where("status", "done")
            ->when(($year != null), function($query) use($year){
                $query->whereYear("date", $year);
            })
            ->orderByRaw("CAST(participant AS INT) desc")
            ->limit(5)
            ->get();

        $datas = [];
        foreach ($events as $i) {
            array_push($datas, intval($i->participant));
        }
        
        return [
            "events" => collect($events)->map(function ($i){ return $i->name; })->values()->toArray(),
            "series" => $datas,
        ];
    }



    // API
    public function apiBookingYearly($year){
        $data = $this->getBookingByYear($year);

        return json_encode($data);
    }
    
    public function apiBookingTopRoom($date){
        $data = $this->getBookingTopRoom($date);

        return json_encode($data);
    }

    public function apiEventYearly($year){
        $data = $this->getEventByYear($year);

        return json_encode($data);
    }

    public function apiEventTop($year){
        $data = [];

        if ($year == "all") {
            $data = $this->getEventTop();
        }else{
            $data = $this->getEventTop($year);
        }

        return json_encode($data);
    }
}
