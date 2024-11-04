<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Statistik;

class StatistikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $statistik = Statistik::all();


        $data = [
            'statistik' => $statistik
        ];



        return view('backend.webcontent.statistik.viewstatistik', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Statistik $statistik)
    {
        //
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
    public function update($request, Statistik $statistik)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Statistik $statistik)
    {
        //
    }
}
