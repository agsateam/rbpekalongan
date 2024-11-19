<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\BookingTime;
use App\Models\WebContent;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;

class ManageBookingController extends Controller
{
    public function index(){
        return view('backend.booking.index');
    }

    public function history(){
        return view('backend.booking.history');
    }

    public function open(){
        return view('backend.booking.open', [
            "open" => WebContent::select(["open_booking"])->first()->toArray()['open_booking']
        ]);
    }

    public function openUpdate($open){
        $data = WebContent::first();
        $data->update(["open_booking" => ($open == 'close' ? false : true)]);

        return back();
    }

    public function checkin($id){
        $data = Booking::find($id);
        $data->update(['check_in' => Carbon::now()->toDateTimeString()]);

        BookingTime::where('id', $data->booking_time_id)->update([
            "booked" => DB::raw('booked + ' . $data->booking_seat)
        ]);

        return back()->with('success', 'Check-in '.$data->code.' berhasil.');
    }

    public function cancel($id){
        $data = Booking::find($id);
        $data->update(['status' => 'canceled']);

        return back()->with('success', 'Booking '.$data->code.' berhasil dibatalkan.');
    }



    // Datatable
    public function getData(Request $request)
    {
        $datas = null;
        if ($request->has('history')) {
            $datas = Booking::whereDate('created_at', '<', Carbon::today())->with(['room', 'time']);
        }else{
            $datas = Booking::whereDate('created_at', Carbon::today())->where('status', null)->with(['room', 'time']);
        }

        return DataTables::of($datas)
            ->editColumn('room', function ($data) {
                return $data->room->name ."<br/>". $data->time->open ." - ". $data->time->close." WIB";
            })
            ->editColumn('created_at', function ($data) {
                return Carbon::createFromDate($data->created_at)->format("d/m/Y H:i");
            })
            ->editColumn('status', function ($data) use($request) {
                $status = null;
                if ($request->has('history')) {
                    $status = $data->status == 'done' ? "<span class='text-emerald-700'>Selesai</span>" : "<span class='text-red-700'>Dibatalkan</span>";
                } else {
                    $status = $data->check_in ? "<span class='text-emerald-700'>Sudah Check-in</span>" : 'Belum Check-in';
                }
                
                return $status;
            })
            ->editColumn('action', function ($data) {
                return view('components.backend.booking.aksi', [
                    "data" => $data
                ]);
            })
            ->rawColumns(['room', 'status'])
            ->addIndexColumn()
            ->toJson();
    }
}
