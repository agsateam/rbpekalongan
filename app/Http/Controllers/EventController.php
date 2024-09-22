<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventRegistration;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class EventController extends Controller
{
    public function front(){
        $events = Event::orderBy('date', 'desc')->get();

        return view('frontend.event', [
            "events" => $events
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
        ], [
            'name.required' => 'Nama harus diisi!',
            'address.required' => 'Alamat harus diisi!',
            'phone.required' => 'Nomor HP/WA harus diisi!',
            'phone.min' => 'Nomor HP/WA minimal 10 karakter!'
        ]);

        $data = $req->all();
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
        $registration = EventRegistration::with('event')->orderBy('created_at', 'desc');

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
