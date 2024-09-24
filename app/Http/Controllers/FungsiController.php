<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FungsiController extends Controller
{
    public function index()
    {
        return view('backend.webcontent.fungsi.viewfungsi');
    }
}
