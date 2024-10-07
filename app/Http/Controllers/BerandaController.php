<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Product;
use App\Models\Fungsi1;
use App\Models\Fungsi2;
use App\Models\Fungsi3;
use App\Models\Fungsi4;
use App\Models\Fungsi5;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BerandaController extends Controller
{
    public function index()
    {
        $events = Event::where('status', 'upcoming')->orderBy('date', 'desc')->get();
        $products = Product::orderBy('created_date', 'desc')->with('umkm')->limit(4)->get();
        $fungsi1 = Fungsi1::all();
        $fungsi2 = Fungsi2::all();
        $fungsi3 = Fungsi3::all();
        $fungsi4 = Fungsi4::all();
        $fungsi5 = Fungsi5::all();


        return view('frontend.beranda', [
            'igPosts' => $this->getInstagramPosts() ?? ["data" => []],
            'events' => $events,
            'products' => $products,
            'fungsi1' => $fungsi1,
            'fungsi2' => $fungsi2,
            'fungsi3' => $fungsi3,
            'fungsi4' => $fungsi4,
            'fungsi5' => $fungsi5,

        ]);
    }


    // IG API
    private function getInstagramPosts()
    {
        try {
            $response = Http::get('https://graph.instagram.com/me/media', [
                'fields' => 'id,caption,media_url,media_type,permalink,thumbnail_url,timestamp',
                'limit' => 10,
                'access_token' => env("IG_TOKEN"),
            ]);

            if ($response->status() == 200) {
                return json_decode($response->body(), true);
            } else {
                return null;
            }
        } catch (\Throwable $th) {
            return null;
        }
    }
}
