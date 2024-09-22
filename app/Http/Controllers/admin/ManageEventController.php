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
        $data = Event::where('id', $id)->with('registration')->first();

        $participants = collect($data->registration)->sortByDesc('created_at');

        return view('backend.event.detail', [
            "data" => $data,
            "participants" => $data->status == "done" ? $participants->where('status', 'accepted') : $participants
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
        $data = [
            "name" => $req->nama,
            "deskripsi" => $req->deskripsi,
            "date" => explode("T", $req->date)[0],
            "time" => explode("T", $req->date)[1],
            "location" => $req->location,
            "poster" => $req->old_poster,
        ];

        if($req->has('poster')){
            // remove old poster
            $path = explode("uploaded/event", $req->old_poster);
            unlink(public_path('uploaded/event') . $path[1]);
            // upload new poster
            $imageName = time().'.'.$req->poster->extension();
            $req->poster->move(public_path('uploaded/event'), $imageName);
            // update data
            $data['poster'] = url('uploaded/event') ."/". $imageName;
        }

        Event::where('id', $req->id)->update($data);

        return redirect(route('manage.event'))->with('success', 'Data event berhasil diperbarui.');
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
        Event::where('id', $req->id)->update(["status" => "done", "participant" => $req->participant]);

        return back()->with('success', 'Event berhasil diperbarui');
    }

    // Datatable
    public function getData()
    {
        $events = Event::select(['id', 'name', 'date', 'time', 'location', 'status']);

        return DataTables::of($events)
            ->editColumn('date', '{{ Carbon\Carbon::createFromDate($date)->format("d/m/Y") }}')
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
