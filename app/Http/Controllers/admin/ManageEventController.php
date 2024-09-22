<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ManageEventController extends Controller
{
    public function index(){
        return view('backend.event.event');
    }

    public function detail($id){
        $data = Event::where('id', $id)->first();

        $fakeParticipants = [
            [
                "name" => "Andi",
                "gender" => "Laki-Laki",
                "age" => 23,
                "number" => "08150021000",
                "address" => "Padukuhan Kraton",
                "is_have_umkm" => false,
                "umkm" => null,
            ],
            [
                "name" => "Yono",
                "gender" => "Laki-Laki",
                "age" => 23,
                "number" => "08150021000",
                "address" => "Degayu",
                "is_have_umkm" => true,
                "umkm" => "Tahu Bakso Yono",
            ],
        ];

        return view('backend.event.detail', [
            "data" => $data,
            "participants" => $fakeParticipants
        ]);
    }

    public function create(){
        return view('backend.event.add');
    }

    public function edit($id){
        $data = Event::where('id', $id)->first();

        return view('backend.event.edit', [
            "data" => $data,
        ]);
    }

    public function update(Request $req){
        // dd($req->all(), $req->has('poster'));
        
        $data = [
            "name" => $req->nama,
            "deskripsi" => $req->deskripsi,
            "date" => explode("T", $req->date)[0],
            "time" => explode("T", $req->date)[1],
            "location" => $req->location,
            "status" => "upcoming"
        ];

        if($req->has('poster')){
            $imageName = time().'.'.$req->poster->extension();
            $req->poster->move(public_path('uploaded/event'), $imageName);

            $data['poster'] = url('uploaded/event') ."/". $imageName;
        }

        dd($data);

        Event::create($data);

        return redirect(route('manage.event'))->with('success', 'Data event berhasil dibuat.');
    }

    public function store(Request $req){
        $imageName = time().'.'.$req->poster->extension();
        $req->poster->move(public_path('uploaded/event'), $imageName);

        $data = [
            "name" => $req->nama,
            "deskripsi" => $req->deskripsi,
            "date" => explode("T", $req->date)[0],
            "time" => explode("T", $req->date)[1],
            "location" => $req->location,
            "poster" => url('uploaded/event') ."/". $imageName,
            "status" => "upcoming"
        ];

        Event::create($data);

        return redirect(route('manage.event'))->with('success', 'Data event berhasil dibuat.');
    }

    public function destroy($id){
        Event::where('id', $id)->delete();
        return redirect(route('manage.event'))->with('success', 'Data event berhasil dihapus.');
    }

    public function done(Request $req){
        dd($req->all());
    }

    public function getData()
    {
        $events = Event::select(['id', 'name', 'date', 'time', 'location', 'status'])->orderBy('date', 'desc');

        return DataTables::of($events)
            ->editColumn('date', '{{ Carbon\Carbon::createFromDate($date)->format("d M Y") }}')
            ->editColumn('status', function ($data) {
                return view('components.backend.event.status', [
                    "data" => $data
                ]);
            })
            ->addColumn('action', function ($data) {
                return view('components.backend.event.aksi', [
                    "data" => $data
                ]);
            })
            ->toJson();
    }
}
