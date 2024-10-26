<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\BookingRoom;
use App\Models\BookingTime;
use Illuminate\Http\Request;

class ManageRoomController extends Controller
{
    public function index()
    {
        $data = BookingRoom::with('times')->get();
        return view('backend.room.index', ["data" => $data]);
    }
    
    public function detail($id)
    {
        $data = BookingRoom::with('times')->findOrFail($id);
        return view('backend.room.detail', ["data" => $data]);
    }

    public function add()
    {
        return view('backend.room.add');
    }

    public function store(Request $request)
    {
        BookingRoom::create($request->all());
        return redirect()->route('manage.room')->with('success', 'Berhasil menambahkan ruangan');
    }

    public function edit($id)
    {
        $data = BookingRoom::findOrFail($id);
        return view('backend.room.edit', ["data" => $data]);
    }

    public function update(Request $request)
    {
        BookingRoom::where('id', $request->id)->update([
            "name" => $request->name,
            "seat" => $request->seat,
            "isMustFullBooking" => $request->isMustFullBooking,
        ]);

        return redirect()->route('manage.room')->with('success', 'Data ruangan berhasil diperbarui');
    }

    public function delete($id)
    {
        BookingRoom::where('id', $id)->delete();
        return back()->with('success', 'Berhasil menghapus ruangan');
    }

    public function status($id, $status)
    {
        BookingRoom::where('id', $id)->update(["open_booking" => ($status == "open" ? true : false)]);
        return back()->with('success', 'Booking ruangan ' . ($status == "open" ? 'dibuka' : 'ditutup'));
    }


    // Kesediaan Waktu
    public function saveTime(Request $request)
    {
        BookingTime::create($request->all());
        return back()->with('success', 'Kesediaan waktu booking berhasil ditambahkan');
    }

    public function updateTime(Request $request)
    {
        BookingTime::where('id', $request->id)->update([
            "open" => $request->open,
            "close" => $request->close
        ]);
        return back()->with('success', 'Kesediaan waktu booking diperbarui');
    }

    public function dropTime($id)
    {
        BookingTime::where('id', $id)->delete();
        return back()->with('success', 'Kesediaan waktu booking dihapus');
    }
}
