<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mitra;
use Illuminate\Support\Facades\Storage;


class MitraController extends Controller
{
    public function index()
    {
        $mitra = Mitra::all();

        $data = [
            "mitra" => $mitra,
        ];


        return view('backend.webcontent.mitra.viewmitra', $data);
    }

    public function create()
    {
        return view('backend.webcontent.mitra.addmitra');
    }

    public function store(Request $request)
    {


        $validatedData = $request->validate([
            'nama_mitra' => 'required|string|max:255',
            'link' => 'required|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Buat objek mitra baru
        $mitra = new Mitra();

        // Set properti berdasarkan input yang divalidasi
        $mitra->fill([
            'nama_mitra' => $validatedData['nama_mitra'],
            'link' => $validatedData['link'],
        ]);


        // Fungsi untuk upload gambar
        if ($request->hasFile('logo')) {
            // Tentukan path penyimpanan gambar
            $imageName = uniqid() . '.' . $request->file('logo')->extension();
            $request->file('logo')->move(public_path('uploaded/mitra'), $imageName);

            // Simpan URL path gambar
            $mitra->logo = url('uploaded/mitra/' . $imageName);
        }


        // Simpan data ke database
        $mitra->save();

        // Redirect dengan pesan sukses
        return redirect()->route('webcontent.mitra')->with('success', 'Mitra berhasil disimpan!');
    }

    public function edit($id)
    {

        $mitra = Mitra::findOrFail($id);


        return view('backend.webcontent.mitra.editmitra', compact('mitra'));
    }

    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'nama_mitra' => 'required|string|max:255',
            'link' => 'required|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $mitra = Mitra::findOrFail($id);

        if ($request->hasFile('logo')) {
            if ($mitra->logo) {
                Storage::delete('public/' . str_replace(url(''), '', $mitra->logo));
            }
            $imageName = uniqid() . '.' . $request->logo->extension();
            $request->logo->move(public_path('uploaded/mitra'), $imageName);
            $mitra->logo = url('uploaded/mitra/' . $imageName);
        }

        $mitra->nama_mitra = $validatedData['nama_mitra'];
        $mitra->link = $validatedData['link'];
        $mitra->save();

        return redirect()->route('webcontent.mitra')->with('success', 'Data Mitra berhasil diupdate!');
    }

    public function destroy($id)
    {
        // Cari mitra berdasarkan id
        $mitra = Mitra::findOrFail($id);

        // Hapus logo dari storage jika ada
        if ($mitra->logo) {
            Storage::delete($mitra->logo);
        }

        // Hapus data mitra dari database
        $mitra->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('webcontent.mitra')->with('success', 'Data mitra berhasil dihapus.');
    }
}
