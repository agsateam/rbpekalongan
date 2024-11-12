<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Statistik;
use App\Models\Event;
use Illuminate\Http\Request;


class StatistikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $statistik = Statistik::all();
        $jumlahevent = Event::count();



        $data = [
            'statistik' => $statistik,
            'jumlahevent' => $jumlahevent
        ];



        return view('backend.webcontent.statistik.viewstatistik', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)

    {
        $statistik = Statistik::findOrFail($id);

        return view('backend.webcontent.statistik.editstatistik', compact('statistik'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'jumlah' => 'required|integer',
        ]);

        // Cari data statistik berdasarkan ID yang diberikan
        $statistik = Statistik::findOrFail($id);

        // Update field 'jumlah' dengan nilai yang divalidasi
        $statistik->jumlah = $validatedData['jumlah'];

        // Simpan perubahan
        $statistik->save();

        return redirect()->route('webcontent.statistik')->with('success', 'Statistik berhasil diupdate!');
    }
}
