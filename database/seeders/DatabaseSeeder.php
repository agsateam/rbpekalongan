<?php

namespace Database\Seeders;

use App\Models\Fasilitator;
use App\Models\User;
use App\Models\WebContent;
use Faker\Provider\Lorem;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Administrator',
            'email' => 'admin@example.com',
        ]);
        User::factory()->create([
            'name' => 'Second Administrator',
            'email' => 'admin2@example.com',
        ]);

        WebContent::create(["video_desc" => "Video Profil Rumah BUMN Pekalongan"]);

        $this->call([
            ProductCategorySeeder::class,
            // EventSeeder::class,
            HeroSeeder::class,
            FungsiRBSeeder::class,
            BookingRoomSeeder::class,
            LinkSeeder::class,
            JenisStatistikSeeder::class,
            StatistikSeeder::class,
        ]);

        Fasilitator::create([
            "name" => "Muhammad Saebani",
            "photo" => "https://rbpekalongan.id/images/preview-image.jpg",
            "certification" => "IHATEC - Pelatihan Kompetensi Penyelia Halal & Penerapan Standar Halal Berbasis SKKNI,RUMAH KREATIF BUMN - Training Of Trainer Product Digital DBS untuk Fasilitator RKB,BNSP - tersertifikasi Pendamping UMKM dalam bidang Koperasi dan UMKM,PPSDM  IPB - Bimbingan Teknis Pendamping Usaha Mikro Kecil dan Menegah,LKP THETA INSTITUTE - Public Speaking,GAPURA DIGITAL - Cara Mudah Membuat Situs untuk Bisnis Anda,GAPURA DIGITAL - Tips Membuat Situs Bisnis yang Efektif,RUMAH BUMN TELKOM - 2nd Best Perfomance RB Kelas A,RUMAH BUMN TELKOM - 3rd Best UMKM Digitalization,TELKOM CORPORATE UNIVERSITY CENTER - Sertifikasi SME Assistant (Brevet 1 - Marketing),BUMN - Rumah BUMN Master Trainer Bootcamp Jakarta",
            "whatsapp" => "6282325065133"
        ]);
        Fasilitator::create([
            "name" => "Dwina Nugraheni",
            "photo" => "https://rbpekalongan.id/images/preview-image.jpg",
            "certification" => "Certified BNSP (Badan Nasional Sertifikasi Profesi) telah kompeten pada Bidang Koperasi dan UMKM sebagai Pendamping UKM,Certified Penyelia Halal UKM & Penerapan Standar Halal Berbasis SKKNI oleh IHATEC (Indonesian Halal Training and Education Center),Certified Public Speaking (CPS) oleh LKP Theta Institute LMT Well Done Skills",
            "whatsapp" => "6282324944029"
        ]);
    }
}
