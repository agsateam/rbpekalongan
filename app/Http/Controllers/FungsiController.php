<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fungsi;
use Illuminate\Support\Facades\Storage;

use App\Models\Fungsi1;
use App\Models\Fungsi2;
use App\Models\Fungsi3;
use App\Models\Fungsi4;
use App\Models\Fungsi5;



class FungsiController extends Controller
{
    public function index()
    {
        $fungsi = Fungsi::all();
        $fungsi1 = Fungsi1::all();
        $fungsi2 = Fungsi2::all();
        $fungsi3 = Fungsi3::all();
        $fungsi4 = Fungsi4::all();
        $fungsi5 = Fungsi5::all();



        $data = [
            "fungsi" => $fungsi,
            "fungsi1" => $fungsi1,
            "fungsi2" => $fungsi2,
            "fungsi3" => $fungsi3,
            "fungsi4" => $fungsi4,
            "fungsi5" => $fungsi5,
        ];


        return view('backend.webcontent.fungsi.jenisfungsi', $data);
    }

    public function edit($id)
    {
        switch ($id) {
            case 1:
                $fungsi = Fungsi1::all();
                break;
            case 2:
                $fungsi = Fungsi2::all();
                break;
            case 3:
                $fungsi = Fungsi3::all();
                break;
            case 4:
                $fungsi = Fungsi4::all();
                break;
            case 5:
                $fungsi = Fungsi5::all();
                break;
            default:
                return redirect()->back()->with('error', 'Fungsi ID tidak valid.');
        }

        // Jika model tidak ditemukan
        if (!$fungsi) {
            return redirect()->back()->with('error', 'Fungsi tidak ditemukan.');
        }

        $data = [
            "fungsi" => $fungsi,
        ];

        return view('backend.webcontent.fungsi.editfungsi', $data);
    }

    public function update(Request $request)
    {
        // Validasi data
        $request->validate([
            'fungsi_id' => 'required|integer|between:1,5', // Menggunakan range untuk ID yang valid
            'deskripsi' => 'required|string',
            'foto1' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'foto2' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'foto3' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'foto4' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'foto5' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $id = $request->fungsi_id;

        // dd($id);
        // Temukan fungsi berdasarkan fungsi_id
        switch ($id) {
            case 1:
                $fungsi = Fungsi1::first();
                break;
            case 2:
                $fungsi = Fungsi2::first();
                break;
            case 3:
                $fungsi = Fungsi3::first();
                break;
            case 4:
                $fungsi = Fungsi4::first();
                break;
            case 5:
                $fungsi = Fungsi5::first();
                break;
            default:
                return redirect()->back()->with('error', 'Fungsi ID tidak valid.');
        }

        // dd($id, $fungsi);
        // Jika model tidak ditemukan
        if (!$fungsi) {
            return redirect()->back()->with('error', 'Fungsi tidak ditemukan.');
        }

        // Update deskripsi fungsi
        $fungsi->deskripsi = $request->deskripsi;

        // Fungsi untuk upload gambar
        function uploadImage($request, $key, $fungsi, $imageField)
        {
            if ($request->hasFile($key)) {
                // Hapus file lama jika ada
                if ($fungsi->$imageField) {
                    Storage::delete('public/' . $fungsi->$imageField);
                }
                // Mengatur nama file dan menyimpan ke folder public/uploaded/fungsi
                $imageName = uniqid() . '.' . $request->$key->extension(); // Menggunakan uniqid() untuk nama file unik
                $request->$key->move(public_path('uploaded/fungsi'), $imageName);
                $fungsi->$imageField = url('uploaded/fungsi/' . $imageName);
            }
        }

        // Upload foto 1-5 jika ada
        uploadImage($request, 'foto1', $fungsi, 'foto1');
        uploadImage($request, 'foto2', $fungsi, 'foto2');
        uploadImage($request, 'foto3', $fungsi, 'foto3');
        uploadImage($request, 'foto4', $fungsi, 'foto4');
        uploadImage($request, 'foto5', $fungsi, 'foto5');

        // dd($fungsi);
        // Simpan perubahan ke database
        $fungsi->save();

        // Redirect kembali ke halaman dengan pesan sukses
        return redirect()->route('webcontent.fungsi')->with('success', 'Data fungsi berhasil diperbarui.');
    }
}
