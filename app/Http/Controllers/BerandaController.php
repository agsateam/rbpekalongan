<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BerandaController extends Controller
{
    public function index(){
        return view('frontend.beranda', [
            'igPosts' => $this->getInstagramPosts() ?? ["data" => []]
        ]);
    }


    // IG API
    private function getInstagramPosts(){
        try {
            $response = Http::get('https://graph.instagram.com/me/media', [
                'fields' => 'id,caption,media_url,media_type,permalink,thumbnail_url,timestamp',
                'limit' => 10,
                'access_token' => env("IG_TOKEN"),
            ]);

            if($response->status() == 200 ){
                return json_decode($response->body(), true);
            }else{
                return null;
            }
        } catch (\Throwable $th) {
            return null;
        }
    }
}