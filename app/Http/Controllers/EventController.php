<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function front(){
        $events = [
            [
                'name' => 'Seminar Digital Marketing',
                'deskripsi' => 'Pelatihan intensif mengenai strategi digital marketing untuk UMKM, membantu meningkatkan penjualan melalui platform online. Pelatihan intensif mengenai strategi',
                'date' => '2024-09-20',
                'time' => '10.00',
                'location' => 'Rumah BUMN Kota Pekalongan',
                'poster' => 'https://random.imagecdn.app/640/640?a=' . rand(1,100),
                'status' => 'upcoming'
            ],
            [
                'name' => 'Workshop Branding Produk',
                'deskripsi' => 'Workshop khusus bagi pelaku UMKM untuk membangun identitas merek yang kuat dan menarik bagi konsumen.',
                'date' => '2024-10-05',
                'time' => '10.00',
                'location' => 'Rumah BUMN Kota Pekalongan',
                'poster' => 'https://random.imagecdn.app/640/640?a=' . rand(1,100),
                'status' => 'upcoming'
            ],
            [
                'name' => 'Expo UMKM Nasional',
                'deskripsi' => 'Pameran nasional yang menampilkan produk-produk unggulan dari berbagai UMKM, serta mempertemukan pelaku usaha dengan investor.',
                'date' => '2024-11-15',
                'time' => '10.00',
                'location' => 'Rumah BUMN Kota Pekalongan',
                'poster' => 'https://random.imagecdn.app/640/640?a=' . rand(1,100),
                'status' => 'done'
            ],
            [
                'name' => 'Pelatihan Manajemen Keuangan',
                'deskripsi' => 'Pelatihan bagi UMKM untuk mengelola keuangan bisnis secara lebih profesional dan efisien, mulai dari pencatatan hingga laporan keuangan.',
                'date' => '2024-12-02',
                'time' => '10.00',
                'location' => 'Rumah BUMN Kota Pekalongan',
                'poster' => 'https://random.imagecdn.app/640/640?a=' . rand(1,100),
                'status' => 'done'
            ],
            [
                'name' => 'Seminar Pengembangan Produk',
                'deskripsi' => 'Seminar ini membahas teknik dan strategi untuk mengembangkan produk yang inovatif dan berkelanjutan dalam pasar kompetitif.',
                'date' => '2024-12-20',
                'time' => '10.00',
                'location' => 'Rumah BUMN Kota Pekalongan',
                'poster' => 'https://random.imagecdn.app/640/640?a=' . rand(1,100),
                'status' => 'done'
            ]
        ];

        return view('frontend.event', [
            "events" => $events
        ]);
    }

    public function regist($id = null){
        $data = [
            'name' => 'Seminar Pengembangan Produk',
            'deskripsi' => 'Seminar ini membahas teknik dan strategi untuk mengembangkan produk yang inovatif dan berkelanjutan dalam pasar kompetitif.',
            'date' => '2024-12-20',
            'time' => '10.00',
            'location' => 'Rumah BUMN Kota Pekalongan',
            'poster' => 'https://random.imagecdn.app/640/640?a=' . rand(1,100),
            'status' => 'done'
        ];

        return view('frontend.event_regist', [
            "data" => $data
        ]);
    }

    public function registPost(Request $req){
        return redirect(route('event.regist.success'));
    }

    public function registSuccess(){
        return view('frontend.event_regist_success');
    }
}
