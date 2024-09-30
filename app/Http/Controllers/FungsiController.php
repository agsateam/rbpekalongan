<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fungsi;

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

        // dd($data);


        return view('backend.webcontent.fungsi.viewfungsi', $data);
    }
}
