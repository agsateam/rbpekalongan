<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ManageTestiController extends Controller
{
    public function index(){
        $data = Testimoni::where('status', 'accepted')->get();

        return view('backend.testi.index', [
            "data" => $data
        ]);
    }

    public function verify(){
        $data = Testimoni::where('status', 'send')->get();

        return view('backend.testi.verify', [
            "data" => $data
        ]);
    }

    public function accept($id){
        Testimoni::where('id', $id)->update(['status' => 'accepted']);
        return back()->with('success', 'Berhasil diverifikasi, testimoni akan ditampilkan.');
    }

    public function reject($id){
        Testimoni::where('id', $id)->delete();
        return back()->with('success', 'Ditolak, testimoni dihapus.');
    }

    public function create(){
        return view("frontend.testi");
    }

    public function store(Request $request){
        $data = $request->all();
        $data['name'] = Str::title($data['name']);
        $data['status'] = "send";

        Testimoni::create($data);

        return view('frontend.testi_sended');
    }

    public function delete($id){
        Testimoni::where('id', $id)->delete();
        return back()->with('success', 'Testimoni berhasil dihapus.');
    }
}
