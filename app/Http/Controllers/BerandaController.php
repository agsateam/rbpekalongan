<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Product;
use App\Models\Umkm;
use App\Models\FungsiRB;
use App\Models\Mitra;
use App\Models\WebContent;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BerandaController extends Controller
{
    public function index()
    {
        $events = Event::where('status', 'upcoming')->orderBy('date', 'desc')->get();
        $products = Product::orderBy('created_date', 'desc')->with('umkm')->limit(4)->get();

        //statistik
        $gomodern = Umkm::count();
        $godigital = DB::table('umkms')->where(function ($query) {
            $query->whereNotNull('instagram')
                ->orWhereNotNull('facebook');
        })
            ->count();
        $goonline = DB::table('umkms')->where(function ($query) {
            $query->whereNotNull('marketplace');
        })->count();
        $jumlahevent = Event::count();


        $fungsirb = FungsiRB::all();
        $mitra = Mitra::all();


        return view('frontend.beranda', [
            'igPosts' => $this->getInstagramPosts() ?? ["data" => []],
            'events' => $events,
            'products' => $products,
            'fungsirb' => $fungsirb,
            'mitra' => $mitra,
            'gomodern' => $gomodern,
            'godigital' => $godigital,
            'goonline' => $goonline,
            'jumlahevent' => $jumlahevent
        ]);
    }

    public function videoEdit()
    {
        $data = WebContent::select(["video_link", "video_desc"])->first();
        
        return view('backend.webcontent.video.index', ["data" => $data]);
    }

    public function videoUpdate(Request $req)
    {
        WebContent::where('id', 1)->update([
            "video_link" => $req->video_link,
            "video_desc" => $req->video_desc,
        ]);

        return back()->with('success', 'Berhasil diperbarui.');
    }

    public function igTokenEdit()
    {
        $data = WebContent::select(["instagram_token"])->first();
        
        return view('backend.webcontent.igtoken.index', ["data" => $data]);
    }

    public function igTokenUpdate(Request $req)
    {
        WebContent::where('id', 1)->update([
            "instagram_token" => str_replace("Access Token: ", "", $req->token),
        ]);

        return back()->with('success', 'Berhasil diperbarui.');
    }




    // IG API
    private function getInstagramPosts()
    {
        $token = WebContent::select(["instagram_token"])->first();

        try {
            $response = Http::get('https://graph.instagram.com/me/media', [
                'fields' => 'id,caption,media_url,media_type,permalink,thumbnail_url,timestamp',
                'limit' => 10,
                'access_token' => $token->instagram_token,
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
