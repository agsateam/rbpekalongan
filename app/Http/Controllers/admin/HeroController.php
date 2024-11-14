<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class HeroController extends Controller
{
    public function index()
    {

        $hero = Hero::all();

        $data = [
            "hero" => $hero,
        ];


        return view('backend.webcontent.hero.viewhero', $data);
    }

    public function edit($id)

    {

        $hero = Hero::findOrFail($id);



        return view('backend.webcontent.hero.edithero', compact('hero'));
    }

    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'foto1' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'foto2' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'foto3' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'foto4' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'foto5' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'foto6' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'deskripsi' => 'required|string',
        ]);



        $hero = Hero::findOrFail($id);

        function uploadImage($request, $key, $hero, $imageField)
        {
            if ($request->hasFile($key)) {
                // Hapus file lama jika ada
                if ($hero->$imageField) {
                    Storage::delete('public/' . $hero->$imageField);
                }
                // Mengatur nama file dan menyimpan ke folder public/uploaded/hero
                $imageName = uniqid() . '.' . $request->$key->extension(); // Menggunakan uniqid() untuk nama file unik
                $request->$key->move(public_path('uploaded/hero'), $imageName);
                $hero->$imageField = url('uploaded/hero/' . $imageName);
            }
        }

        // Upload foto 1-5 jika ada
        uploadImage($request, 'foto1', $hero, 'foto1');
        uploadImage($request, 'foto2', $hero, 'foto2');
        uploadImage($request, 'foto3', $hero, 'foto3');
        uploadImage($request, 'foto4', $hero, 'foto4');
        uploadImage($request, 'foto5', $hero, 'foto5');
        uploadImage($request, 'foto6', $hero, 'foto6');


        $hero->deskripsi = $validatedData['deskripsi'];


        $hero->save();

        return redirect()->route('webcontent.hero')->with('success', 'Data berhasil diperbarui.');
    }
}
