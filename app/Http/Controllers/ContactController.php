<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        return view('frontend.contact');
    }

    public function regist(Request $request){
        $imageName = time().'.'.$request->logo->extension();
        $request->logo->move(public_path('uploaded/umkm'), $imageName);
        
        $data = [
            "name" => $request->umkm,
            "owner" => $request->owner,
            "phone" => $request->whatsapp,
            "fasilitator_id" => $request->mentor_id,
            "npwp" => $request->npwp,
            "address" => $request->address,
            "join_reason" => $request->join_reason,
            "logo" => url('uploaded/umkm') ."/". $imageName,
            "status" => "registered",
        ];
        
        Umkm::create($data);

        return redirect(route('umkm.regist.success'));
    }

    public function registSuccess(){
        return view('frontend.umkm_regist_success');
    }
}
