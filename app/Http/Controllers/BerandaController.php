<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Product;
use App\Models\FungsiRB;
use App\Models\Mitra;
use App\Models\WebContent;
use App\Models\Hero;
use App\Models\NotificationLog;
use App\Models\Statistik;
use App\Models\Testimoni;
use App\Models\LinkMedsos;
use App\Models\JenisStatistik;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BerandaController extends Controller
{
    public function index()
    {
        $events = Event::where('status', 'upcoming')->orderBy('date', 'desc')->get();

        $jenisstatistik = JenisStatistik::all();
        $jumlahStatistik = Statistik::select('jenis_statistiks_id', DB::raw('SUM(jumlah) as total_jumlah'))
            ->groupBy('jenis_statistiks_id')
            ->get();

        // dd($jumlahStatistik);
        $jumlahevent = Event::count();

        $fungsirb = FungsiRB::all();
        $mitra = Mitra::all();
        $hero = Hero::all();
        $testi = Testimoni::where('status', 'accepted')->get();

        $link = LinkMedsos::all();

        return view('frontend.beranda', [
            'igPosts' => $this->getInstagramPosts() ?? ["data" => []],
            'testi' => $testi,
            'events' => $events,
            'fungsirb' => $fungsirb,
            'mitra' => $mitra,
            'jenisstatistik' => $jenisstatistik,
            'jumlahevent' => $jumlahevent,
            'hero' => $hero,
            'link' => $link,
            'jumlahstatistik' => $jumlahStatistik
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
        $data = WebContent::select(["rb_token", "gerai_token"])->first();

        return view('backend.webcontent.igtoken.index', ["data" => $data]);
    }

    public function igTokenUpdate(Request $req)
    {
        WebContent::where('id', 1)->update([
            "rb_token" => str_replace("Access Token: ", "", $req->rb_token),
            "gerai_token" => str_replace("Access Token: ", "", $req->gerai_token),
        ]);

        return back()->with('success', 'Berhasil diperbarui.');
    }

    public function notifNumberEdit()
    {
        $data = WebContent::select(["whatsapp_notif"])->first();

        return view('backend.webcontent.notif.index', ["data" => $data]);
    }

    public function notifNumberUpdate(Request $req)
    {
        WebContent::where('id', 1)->update([
            "whatsapp_notif" => $req->number,
        ]);

        return back()->with('success', 'Berhasil diperbarui.');
    }




    // IG API
    private function getInstagramPosts()
    {
        $token = WebContent::select(["rb_token"])->first();

        try {
            $response = Http::get('https://graph.instagram.com/me/media', [
                'fields' => 'id,caption,media_url,media_type,permalink,thumbnail_url,timestamp',
                'limit' => 12,
                'access_token' => $token->rb_token,
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


    // Notification Logs - Private Page
    public function notifLogs()
    {
        return view('frontend.notifLogs', [
            "data" => NotificationLog::orderBy("created_at", "desc")->paginate(20)
        ]);
    }
}
