<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events = [
            [
                'name' => 'Seminar Digital Marketing',
                'deskripsi' => 'Pelatihan intensif mengenai strategi digital marketing untuk UMKM, membantu meningkatkan penjualan melalui platform online.',
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
                'deskripsi' => 'Pelatihan bagi UMKM untuk mengelola keuangan bisnis secara lebih profesional dan efisien.',
                'date' => '2024-12-02',
                'time' => '10.00',
                'location' => 'Rumah BUMN Kota Pekalongan',
                'poster' => 'https://random.imagecdn.app/640/640?a=' . rand(1,100),
                'status' => 'done'
            ],
            [
                'name' => 'Seminar Pengembangan Produk',
                'deskripsi' => 'Seminar ini membahas teknik dan strategi untuk mengembangkan produk yang inovatif.',
                'date' => '2024-12-20',
                'time' => '10.00',
                'location' => 'Rumah BUMN Kota Pekalongan',
                'poster' => 'https://random.imagecdn.app/640/640?a=' . rand(1,100),
                'status' => 'done'
            ],
            [
                'name' => 'Seminar Pemasaran Produk',
                'deskripsi' => 'Strategi pemasaran efektif untuk memperluas pasar produk UMKM.',
                'date' => '2024-11-02',
                'time' => '10.00',
                'location' => 'Rumah BUMN Kota Semarang',
                'poster' => 'https://random.imagecdn.app/640/640?a=' . rand(1,100),
                'status' => 'upcoming'
            ],
            [
                'name' => 'Workshop Pengembangan SDM',
                'deskripsi' => 'Pelatihan peningkatan keterampilan SDM di UMKM.',
                'date' => '2024-11-10',
                'time' => '14.00',
                'location' => 'Rumah BUMN Kota Yogyakarta',
                'poster' => 'https://random.imagecdn.app/640/640?a=' . rand(1,100),
                'status' => 'upcoming'
            ],
            [
                'name' => 'Seminar Teknologi UMKM',
                'deskripsi' => 'Mengenalkan teknologi terbaru untuk mendukung pertumbuhan UMKM.',
                'date' => '2024-10-25',
                'time' => '09.00',
                'location' => 'Rumah BUMN Kota Surabaya',
                'poster' => 'https://random.imagecdn.app/640/640?a=' . rand(1,100),
                'status' => 'upcoming'
            ],
            [
                'name' => 'Pelatihan Pemasaran Digital',
                'deskripsi' => 'Bagaimana memanfaatkan media sosial untuk memaksimalkan penjualan.',
                'date' => '2024-09-29',
                'time' => '09.30',
                'location' => 'Rumah BUMN Kota Jakarta',
                'poster' => 'https://random.imagecdn.app/640/640?a=' . rand(1,100),
                'status' => 'done'
            ],
            [
                'name' => 'Pameran Produk Lokal',
                'deskripsi' => 'Pameran produk lokal dari berbagai UMKM unggulan.',
                'date' => '2024-11-21',
                'time' => '11.00',
                'location' => 'Rumah BUMN Kota Malang',
                'poster' => 'https://random.imagecdn.app/640/640?a=' . rand(1,100),
                'status' => 'upcoming'
            ],
            [
                'name' => 'Pelatihan Keuangan UMKM',
                'deskripsi' => 'Cara mengelola keuangan usaha secara efektif.',
                'date' => '2024-09-17',
                'time' => '13.00',
                'location' => 'Rumah BUMN Kota Bandung',
                'poster' => 'https://random.imagecdn.app/640/640?a=' . rand(1,100),
                'status' => 'done'
            ],
            [
                'name' => 'Seminar Inovasi Produk',
                'deskripsi' => 'Bagaimana mengembangkan inovasi dalam produk UMKM.',
                'date' => '2024-12-01',
                'time' => '09.00',
                'location' => 'Rumah BUMN Kota Solo',
                'poster' => 'https://random.imagecdn.app/640/640?a=' . rand(1,100),
                'status' => 'upcoming'
            ],
            [
                'name' => 'Expo Kreatif Nasional',
                'deskripsi' => 'Pameran produk kreatif dan inovatif dari UMKM nasional.',
                'date' => '2024-12-15',
                'time' => '12.00',
                'location' => 'Rumah BUMN Kota Denpasar',
                'poster' => 'https://random.imagecdn.app/640/640?a=' . rand(1,100),
                'status' => 'done'
            ],
            [
                'name' => 'Seminar Kewirausahaan',
                'deskripsi' => 'Menjadi wirausaha yang sukses dengan strategi yang tepat.',
                'date' => '2024-09-12',
                'time' => '08.00',
                'location' => 'Rumah BUMN Kota Bogor',
                'poster' => 'https://random.imagecdn.app/640/640?a=' . rand(1,100),
                'status' => 'done'
            ],
            [
                'name' => 'Pelatihan Branding Online',
                'deskripsi' => 'Cara membangun identitas merek yang kuat melalui media online.',
                'date' => '2024-11-10',
                'time' => '13.00',
                'location' => 'Rumah BUMN Kota Batam',
                'poster' => 'https://random.imagecdn.app/640/640?a=' . rand(1,100),
                'status' => 'upcoming'
            ],
            [
                'name' => 'Workshop Pemasaran Konten',
                'deskripsi' => 'Teknik membuat konten pemasaran yang menarik untuk UMKM.',
                'date' => '2024-10-08',
                'time' => '10.00',
                'location' => 'Rumah BUMN Kota Pekalongan',
                'poster' => 'https://random.imagecdn.app/640/640?a=' . rand(1,100),
                'status' => 'upcoming'
            ],
            [
                'name' => 'Pelatihan Pembuatan Produk Kreatif',
                'deskripsi' => 'Bagaimana menciptakan produk yang unik dan menarik untuk pasar.',
                'date' => '2024-12-12',
                'time' => '11.00',
                'location' => 'Rumah BUMN Kota Padang',
                'poster' => 'https://random.imagecdn.app/640/640?a=' . rand(1,100),
                'status' => 'done'
            ],
            [
                'name' => 'Expo Produk Inovatif',
                'deskripsi' => 'Menampilkan produk-produk inovatif dari berbagai daerah.',
                'date' => '2024-11-30',
                'time' => '09.30',
                'location' => 'Rumah BUMN Kota Semarang',
                'poster' => 'https://random.imagecdn.app/640/640?a=' . rand(1,100),
                'status' => 'done'
            ],
            [
                'name' => 'Seminar Bisnis Digital',
                'deskripsi' => 'Mengenal dunia bisnis digital untuk UMKM.',
                'date' => '2024-10-15',
                'time' => '09.30',
                'location' => 'Rumah BUMN Kota Surabaya',
                'poster' => 'https://random.imagecdn.app/640/640?a=' . rand(1,100),
                'status' => 'upcoming'
            ],
            [
                'name' => 'Pelatihan Optimasi SEO',
                'deskripsi' => 'Teknik SEO untuk meningkatkan visibilitas produk UMKM di mesin pencari.',
                'date' => '2024-11-25',
                'time' => '10.30',
                'location' => 'Rumah BUMN Kota Bandung',
                'poster' => 'https://random.imagecdn.app/640/640?a=' . rand(1,100),
                'status' => 'upcoming'
            ],
            [
                'name' => 'Workshop Pembuatan Website',
                'deskripsi' => 'Pelatihan untuk membuat website profesional untuk UMKM.',
                'date' => '2024-10-22',
                'time' => '10.00',
                'location' => 'Rumah BUMN Kota Jakarta',
                'poster' => 'https://random.imagecdn.app/640/640?a=' . rand(1,100),
                'status' => 'done'
            ],
            [
                'name' => 'Seminar Digital Branding',
                'deskripsi' => 'Bagaimana membangun branding digital yang kuat untuk UMKM.',
                'date' => '2024-11-12',
                'time' => '09.00',
                'location' => 'Rumah BUMN Kota Surakarta',
                'poster' => 'https://random.imagecdn.app/640/640?a=' . rand(1,100),
                'status' => 'done'
            ],
            [
                'name' => 'Pelatihan Pembuatan Toko Online',
                'deskripsi' => 'Cara mudah membuat toko online yang efektif untuk penjualan produk UMKM.',
                'date' => '2024-12-01',
                'time' => '09.00',
                'location' => 'Rumah BUMN Kota Malang',
                'poster' => 'https://random.imagecdn.app/640/640?a=' . rand(1,100),
                'status' => 'upcoming'
            ],
            [
                'name' => 'Expo Produk Kreatif',
                'deskripsi' => 'Menampilkan berbagai produk kreatif dan inovatif dari UMKM.',
                'date' => '2024-10-29',
                'time' => '10.00',
                'location' => 'Rumah BUMN Kota Denpasar',
                'poster' => 'https://random.imagecdn.app/640/640?a=' . rand(1,100),
                'status' => 'upcoming'
            ]
        ];        
        
        Event::insert($events);
    }
}
