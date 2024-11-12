<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Fasilitator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\File;

class FasilitatorController extends Controller
{
    public function index(){
        $data = Fasilitator::with('umkm')->get();
        return view('backend.fasilitator.index', [
            "data" => $data
        ]);
    }
 
    public function create(){
        return view('backend.fasilitator.add');
    }
 
    public function store(Request $req){
        $req->validate(['photo' => [File::image()->max('2mb')]], ['photo.max' => 'Ukuran gambar terlalu besar, maksimal 2mb.']);

        $photo = "fasilitator-" . Str::slug($req->nama) .'.'. $req->photo->extension();
        $req->photo->move(public_path('uploaded/fasilitator'), $photo);

        $certification = "";
        for ($i=1; $i <= 20; $i++) { 
            $cert = "certification" . $i;
            if ($req[$cert] != null) {
                $certification = $certification .",". $req[$cert];
            }
        }
        $certification = substr($certification, 1);
        
        $data = [
            "name" => $req->nama,
            "photo" => url('uploaded/fasilitator') ."/". $photo,
            "certification" => $certification
        ];

        Fasilitator::create($data);

        return redirect(route('manage.fasilitator'))->with('success', 'Data fasilitator berhasil disimpan');
    }

    public function edit($id){
        $data = Fasilitator::where('id', $id)->first();
        return view('backend.fasilitator.edit', [
            "data" => $data
        ]);
    }

    public function update(Request $req){
        $req->validate(['photo' => [File::image()->max('2mb')]], ['photo.max' => 'Ukuran gambar terlalu besar, maksimal 2mb.']);

        $photoName = explode("uploaded/fasilitator", $req->old_photo)[1];
        if($req->has('photo')){
            // remove old photo
            unlink(public_path('uploaded/fasilitator') . $photoName);
            // upload new photo
            $photo = "fasilitator-" . Str::slug($req->nama) .'.'. $req->photo->extension();
            $req->photo->move(public_path('uploaded/fasilitator'), $photo);

            $photoName = $photo;
        }

        $certification = "";
        for ($i=1; $i <= 20; $i++) { 
            $cert = "certification" . $i;
            if ($req[$cert] != null) {
                $certification = $certification .",". $req[$cert];
            }
        }
        $certification = substr($certification, 1);
        
        $data = [
            "name" => $req->nama,
            "photo" => url('uploaded/fasilitator') ."/". $photoName,
            "certification" => $certification
        ];

        Fasilitator::where('id', $req->id)->update($data);

        return redirect(route('manage.fasilitator'))->with('success', 'Data fasilitator berhasil diupdate');
    }

    public function destroy($id){
        $data = Fasilitator::where('id', $id)->with('umkm')->first();
        if($data->umkm->count() > 0){
            return redirect(route('manage.fasilitator'))->with('error', 'Fasilitator ini memiliki UMKM binaan, tidak bisa dihapus.');
        }
        // remove photo from storage
        $path = explode("uploaded/fasilitator", $data->photo);
        unlink(public_path('uploaded/fasilitator') . $path[1]);

        $data->delete();

        return redirect(route('manage.fasilitator'))->with('success', 'Fasilitator berhasil dihapus.');
    }
}
