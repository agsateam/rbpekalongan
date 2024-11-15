<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use App\Models\LinkMedsos;
use Illuminate\Http\Request;

class LinkMedsosController extends Controller
{
    public function index()
    {

        $link = LinkMedsos::all();

        $data = [
            'link' => $link
        ];



        return view('backend.webcontent.sosmed.index', $data);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'shoppe' => 'required|string',
            'tokopedia' => 'required|string',
            'tiktok' => 'required|string',
            'instagram' => 'required|string',
        ]);

        $link = LinkMedsos::findOrFail($id);

        $link->shoppe = $validatedData['shoppe'];
        $link->tokopedia = $validatedData['tokopedia'];
        $link->tiktok = $validatedData['tiktok'];
        $link->instagram = $validatedData['instagram'];

        $link->save();

        return redirect()->route('webcontent.link')->with('success', 'Data Link Medsos berhasil diupdate!');
    }
}
