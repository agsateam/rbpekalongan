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

    public function create(){
        return view('backend.event.add');
    }

    public function store(Request $req){
        dd($req->all());
    }

    public function destroy($id){
        dd($id);
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
