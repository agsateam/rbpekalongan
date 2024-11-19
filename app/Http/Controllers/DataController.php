<?php

namespace App\Http\Controllers;

use App\Models\Statistik;
use App\Models\Event;
use App\Models\LinkMedsos;
use Illuminate\Http\Request;


class DataController extends Controller
{
    public function getData()
    {
        // $data = Statistik::select('jenis_statistik', 'jumlah')->get();

        $statistik = Statistik::all();
        $jumlahevent = Event::count();
        $linkmedsos = LinkMedsos::all();

        $data = [
            'statistik' => $statistik,
            'jumlahevent' => $jumlahevent,
            'linkmedsos' => $linkmedsos
        ];
        return response()->json($data);
    }
}
