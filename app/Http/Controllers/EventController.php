<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventRegistration;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class EventController extends Controller
{
    public function front(Request $req){
        $title = "Semua Event";
        $type = $req->type ?? "all";
        if ($req->has('type')) {
            $title = $req->type != "all" ? ($req->type == "done" ? "Event Selesai" : "Upcoming Event") : "Semua Event";
        }

        $filterStatus = $req->has('type') ? ($req->type == "all" ? ["upcoming", "done"] : [$req->type]) : ["upcoming", "done"];
        $events = Event::whereIn('status', $filterStatus)
                    ->when(($req->has('keyword') && $req->keyword != ""), function($query) use($req){
                        $query->whereLike('name', '%' . $req->keyword . '%')->get();
                    })
                    ->when(($req->has("date") && $req->date != ""), function($query) use($req){
                        $date = explode("-", $req->date);
                        $filterDate = [
                            Carbon::createFromDate($date[0])->subDay()->endOfDay(),
                            Carbon::createFromDate($date[1])->endOfDay()
                        ];

                        $query->whereBetween('date', $filterDate);
                    })
                    ->orderBy('date', 'desc')->get();

        $isFiltered = $req->has('keyword') || $req->has('type') || $req->has('date');
        return view('frontend.event', [
            "title" => $title,
            "events" => $events,
            "isFiltered" => $isFiltered,
            "type" => $type,
            "req" => $req->all(),
        ]);
    }

    public function regist($id = null){
        $data = Event::where('id', $id)->first();

        if($data->status == "done"){
            return redirect(route('event'));
        }

        return view('frontend.event_regist', [
            "data" => $data
        ]);
    }

    public function registPost(Request $req){
        $req->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required|min:10',
            'g-recaptcha-response' => 'required|captcha',
        ], [
            'name.required' => 'Nama harus diisi!',
            'address.required' => 'Alamat harus diisi!',
            'phone.required' => 'Nomor HP/WA harus diisi!',
            'phone.min' => 'Nomor HP/WA minimal 10 karakter!',
            'g-recaptcha-response.required' => 'Konfirmasi captcha diatas.',
        ]);

        $data = $req->all();
        $data['name'] = Str::title($data['name']);
        $data['is_have_umkm'] = $data['is_have_umkm'] ? true : false;

        EventRegistration::create($data);
        return redirect(route('event.regist.success'));
    }

    public function registSuccess(){
        return view('frontend.event_regist_success');
    }

    // BackEnd
    public function index(){
        return view('backend.event.registration');
    }

    public function accept($id){
        EventRegistration::where('id', $id)->update(['status' => 'accepted']);
        
        return back()->with('success', 'Berhasil disetujui.');
    }

    public function reject($id){
        EventRegistration::where('id', $id)->update(['status' => 'rejected']);
        
        return back();
    }

    // Datatable
    public function getData()
    {
        $registration = EventRegistration::whereIn('status', ['registered', 'rejected'])->with('event')->orderBy('created_at', 'desc');

        return DataTables::of($registration)
            ->addColumn('event', function ($data) {
                return view('components.backend.registration.link_event', [
                    "data" => $data
                ]);
            })
            ->editColumn('umkm', function ($data) {
                return $data->is_have_umkm ? $data->umkm : "-";
            })
            ->editColumn('status', function ($data) {
                return view('components.backend.registration.status', [
                    "data" => $data
                ]);
            })
            ->addColumn('action', function ($data) {
                return view('components.backend.registration.aksi', [
                    "data" => $data
                ]);
            })
            ->toJson();
    }
}
