<?php

namespace App\Http\Controllers;

use App\Models\Fasilitator;
use App\Models\Umkm;
use App\Models\WebContent;
use App\Services\SendNotifService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\File;

class ContactController extends Controller
{
    public function index(){
        $facilitators = Fasilitator::all();
        $whatsapp = WebContent::first()->whatsapp_notif ?? "082136643938";

        return view('frontend.contact', [
            "facilitators" => $facilitators,
            "whatsapp" => $whatsapp
        ]);
    }

    public function regist(Request $request){
        $request->validate([
            'ktp' => ['min_digits:16','max_digits:16'],
            'ktp_image' => ['required', File::image()->max('2mb')],
            'npwp_image' => [File::image()->max('2mb')],
            'logo' => [File::image()->max('2mb')],
            'g-recaptcha-response' => 'required|captcha',
        ], [
            'ktp.min_digits' => 'NIK harus valid 16 digit.',
            'ktp.max_digits' => 'NIK harus valid 16 digit.',
            'ktp_image.max' => 'Ukuran gambar terlalu besar, maksimal 2mb.',
            'npwp_image.max' => 'Ukuran gambar terlalu besar, maksimal 2mb.',
            'logo.max' => 'Ukuran gambar terlalu besar, maksimal 2mb.',
            'g-recaptcha-response.required' => 'Konfirmasi captcha diatas.',
        ]);

        $ktp_image = null;
        $npwp_image = null;
        $logo = null;
        
        if($request->has('ktp_image')){
            $ktp_image = "ktp-" . Str::slug($request->umkm) .'.'. $request->ktp_image->extension();
            $request->ktp_image->move(public_path('uploaded/umkm/ktp'), $ktp_image);
        }
        if($request->has('npwp_image')){
            $npwp_image = "npwp-" . Str::slug($request->umkm) .'.'. $request->npwp_image->extension();
            $request->npwp_image->move(public_path('uploaded/umkm/npwp'), $npwp_image);
        }
        if($request->has('logo')){
            $logo = "logo-" . Str::slug($request->umkm) .'.'. $request->logo->extension();
            $request->logo->move(public_path('uploaded/umkm/logo'), $logo);
        }

        
        $data = [
            "name" => $request->umkm,
            "owner" => $request->owner,
            "phone" => $request->whatsapp,
            "fasilitator_id" => $request->mentor_id,
            "type" => $request->type,
            "desc" => $request->desc,
            "address" => $request->address,
            "instagram" => $request->instagram,
            "facebook" => $request->facebook,
            "marketplace" => $request->marketplace,
            "marketplace_link" => $request->marketplace_link,
            "ktp" => $request->ktp,
            "ktp_image" => $request->has('ktp_image') ? url('uploaded/umkm/ktp') ."/". $ktp_image : null,
            "npwp" => $request->npwp,
            "npwp_image" => $request->has('npwp_image') ? url('uploaded/umkm/npwp') ."/". $npwp_image : null,
            "logo" => $request->has('logo') ? url('uploaded/umkm/logo') ."/". $logo : null,
            "status" => "registered",
        ];

        SendNotifService::notifUmkm($data);
        
        Umkm::create($data);

        return redirect(route('umkm.regist.success'));
    }

    public function registSuccess(){
        return view('frontend.umkm_regist_success');
    }
}
