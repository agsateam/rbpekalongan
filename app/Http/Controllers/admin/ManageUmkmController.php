<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Umkm;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ManageUmkmController extends Controller
{
    public function index(){
        // $data = Umkm::where('status', 'join')->with('fasilitator')->get();
        return view('backend.umkm.index', [
            // "data" => $data
        ]);
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
                return "<button onclick='detail(" . json_encode($data) . ")' class='btn btn-sm bg-[#195770] text-white'>
                            <svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='size-5'>
                                <path stroke-linecap='round' stroke-linejoin='round' d='M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z' />
                                <path stroke-linecap='round' stroke-linejoin='round' d='M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z' />
                            </svg>
                        </button>";
            })
            ->toJson();
    }
}
