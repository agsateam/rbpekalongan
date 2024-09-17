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

    public function getData()
    {
        $events = Event::select(['id', 'name', 'date', 'time', 'location', 'status']);

        return DataTables::of($events)
            ->editColumn('date', '{{ Carbon\Carbon::createFromDate($date)->format("d M Y") }}')
            ->addColumn('action', function ($user) {
                return '<a href="' . route('manage.event.edit') . $user->id . '" class="btn btn-sm bg-[#195770] text-white">Edit</a>';
            })
            ->toJson();
    }
}
