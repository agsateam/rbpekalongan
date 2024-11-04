<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Fasilitator;
use App\Models\Umkm;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class ManageUmkmController extends Controller
{
    public function index(){
        return view('backend.umkm.index');
    }

    public function detail($id){
        $data = Umkm::where('id', $id)->with(['fasilitator'])->first();
        return view('backend.umkm.detail', [
            "data" => $data
        ]);
    }

    public function edit($id){
        $data = Umkm::where('id', $id)->with(['fasilitator'])->first();
        $facilitators = Fasilitator::all();
        return view('backend.umkm.edit', [
            "data" => $data,
            "facilitators" => $facilitators,
        ]);
    }

    public function update(Request $request){
        $request->validate([
            'ktp_image' => [File::image()->max('2mb')],
            'npwp_image' => [File::image()->max('2mb')],
            'logo' => [File::image()->max('2mb')],
        ], [
            'ktp_image.max' => 'Ukuran gambar terlalu besar, maksimal 2mb.',
            'npwp_image.max' => 'Ukuran gambar terlalu besar, maksimal 2mb.',
            'logo.max' => 'Ukuran gambar terlalu besar, maksimal 2mb.',
        ]);

        $data = [
            "name" => $request->umkm,
            "owner" => $request->owner,
            "phone" => $request->whatsapp,
            "fasilitator_id" => $request->fasilitator_id,
            "type" => $request->type,
            "desc" => $request->desc,
            "address" => $request->address,
            "instagram" => $request->instagram,
            "facebook" => $request->facebook,
            "marketplace" => $request->marketplace,
            "marketplace_link" => $request->marketplace_link,
            "ktp" => $request->ktp,
            "npwp" => $request->npwp,
        ];

        $ktp_image = $request->old_ktp;
        $npwp_image = $request->old_npwp;
        $logo = $request->old_logo;
        if($request->has('ktp_image')){
            // remove old image
            if($ktp_image != null){
                $path = explode("uploaded/umkm", $ktp_image);
                unlink(public_path('uploaded/umkm') . $path[1]);
            }
            // upload new image
            $ktp_image = "ktp-" . Str::slug($request->umkm) .'.'. $request->ktp_image->extension();
            $request->ktp_image->move(public_path('uploaded/umkm/ktp'), $ktp_image);
            $data['ktp_image'] = url('uploaded/umkm/ktp') ."/". $ktp_image;
        }
        if($request->has('npwp_image')){
            // remove old image
            if($npwp_image != null){
                $path = explode("uploaded/umkm", $npwp_image);
                unlink(public_path('uploaded/umkm') . $path[1]);
            }
            // upload new image
            $npwp_image = "npwp-" . Str::slug($request->umkm) .'.'. $request->npwp_image->extension();
            $request->npwp_image->move(public_path('uploaded/umkm/npwp'), $npwp_image);
            $data['npwp_image'] = url('uploaded/umkm/npwp') ."/". $npwp_image;
        }
        if($request->has('logo')){
            // remove old image
            if($logo != null){
                $path = explode("uploaded/umkm", $logo);
                unlink(public_path('uploaded/umkm') . $path[1]);
            }
            // upload new image
            $logo = "logo-" . Str::slug($request->umkm) .'.'. $request->logo->extension();
            $request->logo->move(public_path('uploaded/umkm/logo'), $logo);
            $data['logo'] = url('uploaded/umkm/logo') ."/". $logo;
        }

        Umkm::where('id', $request->id)->update($data);

        return redirect(route('manage.umkm.detail') ."/". $request->id)->with('success', 'Data UMKM berhasil diperbarui.');
    }

    public function destroy($id){
        $umkm = Umkm::where('id', $id)->first();

        // remove umkm files from storage
        if($umkm->ktp_image != null){
            $ktp = explode("uploaded/umkm", $umkm->ktp_image);
            unlink(public_path('uploaded/umkm') . $ktp[1]);
        }
        if($umkm->npwp_image != null){
            $npwp = explode("uploaded/umkm", $umkm->npwp_image);
            unlink(public_path('uploaded/umkm') . $npwp[1]);
        }
        if($umkm->logo != null){
            $logo = explode("uploaded/umkm", $umkm->logo);
            unlink(public_path('uploaded/umkm') . $logo[1]);
        }
        // delete data
        $umkm->delete();
        
        return redirect()->route('manage.umkm')->with('success', 'Data UMKM dihapus.');
    }
 
    public function manageRegist(){
        $data = Umkm::where('status', 'registered')->with('fasilitator')->get();
        return view('backend.umkm.registered', [
            "data" => $data
        ]);
    }

    public function accept($id){
        Umkm::where('id', $id)->update(['status' => 'join']);
        
        return back()->with('success', 'Disetujui, UMKM berhasil terdaftar di sistem.');
    }

    public function reject($id){
        $umkm = Umkm::where('id', $id)->first();
        // remove umkm files from storage
        if($umkm->ktp_image != null){
            $ktp = explode("uploaded/umkm", $umkm->ktp_image);
            unlink(public_path('uploaded/umkm') . $ktp[1]);
        }
        if($umkm->npwp_image != null){
            $npwp = explode("uploaded/umkm", $umkm->npwp_image);
            unlink(public_path('uploaded/umkm') . $npwp[1]);
        }
        if($umkm->logo != null){
            $logo = explode("uploaded/umkm", $umkm->logo);
            unlink(public_path('uploaded/umkm') . $logo[1]);
        }
        // delete data
        $umkm->delete();
        
        return back()->with('success', 'Pendaftaran ditolak, data pendaftaran dihapus.');
    }


    // Datatable
    public function getData()
    {
        $umkm = Umkm::where('status', 'join')->with('fasilitator')->orderBy('created_at', 'desc');
        return DataTables::of($umkm)
            ->editColumn('fasilitator', function ($data) {
                return $data->fasilitator->name;
            })
            ->addColumn('action', function ($data) {
                return "
                        <div class='flex items-center'>
                            <a href='" . route('manage.umkm.detail') ."/". $data->id . "' class='flex items-center btn btn-sm bg-[#195770] text-white tooltip' data-tip='Detail'>
                                <svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='size-5'>
                                    <path stroke-linecap='round' stroke-linejoin='round' d='M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z' />
                                    <path stroke-linecap='round' stroke-linejoin='round' d='M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z' />
                                </svg>
                            </a>
                            <button onclick='detail(" . json_encode($data) . ")' class='flex items-center btn btn-sm bg-[#1ba0db] text-white tooltip' data-tip='Berkas'>
                                <svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='size-5'>
                                    <path stroke-linecap='round' stroke-linejoin='round' d='M8.25 7.5V6.108c0-1.135.845-2.098 1.976-2.192.373-.03.748-.057 1.123-.08M15.75 18H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08M15.75 18.75v-1.875a3.375 3.375 0 0 0-3.375-3.375h-1.5a1.125 1.125 0 0 1-1.125-1.125v-1.5A3.375 3.375 0 0 0 6.375 7.5H5.25m11.9-3.664A2.251 2.251 0 0 0 15 2.25h-1.5a2.251 2.251 0 0 0-2.15 1.586m5.8 0c.065.21.1.433.1.664v.75h-6V4.5c0-.231.035-.454.1-.664M6.75 7.5H4.875c-.621 0-1.125.504-1.125 1.125v12c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V16.5a9 9 0 0 0-9-9Z' />
                                </svg>
                            </button>
                        </div>
                    ";
            })
            ->toJson();
    }
}
