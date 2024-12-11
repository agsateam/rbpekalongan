<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Fasilitator;
use App\Models\ProductCategory;
use App\Models\Umkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\File;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class ManageUmkmController extends Controller
{
    public function reset(){ // todo: delete
        Umkm::truncate();

        return redirect()->route('manage.umkm');
    }

    public function index(){
        $total = Umkm::where('status', 'join')->count();

        return view('backend.umkm.index', [
            "total" => $total
        ]);
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
                            <button onclick='detail(" . json_encode(collect($data)->only('ktp', 'ktp_image', 'npwp', 'npwp_image', 'logo')->toArray()) . ")' class='flex items-center btn btn-sm bg-[#1ba0db] text-white tooltip' data-tip='Berkas'>
                                <svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='size-5'>
                                    <path stroke-linecap='round' stroke-linejoin='round' d='M8.25 7.5V6.108c0-1.135.845-2.098 1.976-2.192.373-.03.748-.057 1.123-.08M15.75 18H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08M15.75 18.75v-1.875a3.375 3.375 0 0 0-3.375-3.375h-1.5a1.125 1.125 0 0 1-1.125-1.125v-1.5A3.375 3.375 0 0 0 6.375 7.5H5.25m11.9-3.664A2.251 2.251 0 0 0 15 2.25h-1.5a2.251 2.251 0 0 0-2.15 1.586m5.8 0c.065.21.1.433.1.664v.75h-6V4.5c0-.231.035-.454.1-.664M6.75 7.5H4.875c-.621 0-1.125.504-1.125 1.125v12c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V16.5a9 9 0 0 0-9-9Z' />
                                </svg>
                            </button>
                        </div>
                    ";
            })
            ->toJson();
    }

    public function export(){
        return fastexcel(Umkm::where('status', 'join')->get())->download('UMKM_'.date('dMY').'_rbpekalonganid.xlsx');
    }

    public function import(Request $request){
        set_time_limit(180);

        $validator = Validator::make($request->all(), [
            'file' => 'required|mimes:xlsx',
        ]);

        if ($validator->fails()) {
            return back()->with('error', 'Gagal upload, periksa kembali format file');
        }

        $file = "data-to-import." . $request->file->extension();
        $request->file->move(public_path('uploaded/import'), $file);

        try {
            $this->processImport($file);

            return back()->with('succes', 'Berhasil import data umkm');
        } catch (\Throwable $th) {
            return back()->with('error', 'Gagal import, periksa file kembali');
        }
    }

    private function processImport($file){
        $collection = fastexcel()->import('uploaded/import/' . $file);
        
        $collection->chunk(1000)->each(function ($items) {
            $datas = $items->map(function($item) {
                return [
                    'name' => Str::replace("aEUR", "", Str::replace("aEURoe", "", Str::ascii($item['ukm_name']))),
                    'owner' => $item['pemilik_name'],
                    'phone' => $item['ukm_nohp'],
                    'fasilitator_id' => $this->getFasilId(Str::title($item['fasil_godigital_name'])),
                    'type' => ProductCategory::where('name', $item['kategori_name'])->first()->name ?? 'LAINNYA',
                    'desc' => $item['ukm_deskripsi_usaha'],
                    'address' => $item['ukm_alamat'],
                    'instagram' => $this->getMedsos($item['sosial_media'], 'ig'),
                    'facebook' => $this->getMedsos($item['sosial_media'], 'fb'),
                    'marketplace' => $this->getMarketplace($item['toko_online']),
                    'marketplace_link' => $this->getMarketplaceLink($item['toko_online']),
                    'ktp' => $this->ktpValidation($item['ukm_noktp']),
                    'ktp_image' => null,
                    'npwp' => $item['npwp'] == "" ? null : $item['npwp'],
                    'npwp_image' => null,
                    'logo' => null,
                    'status' => 'join',
                ];
            });

            Umkm::insert($datas->all());
        });

        unlink(public_path('uploaded/import/') . $file);
    }


    // helper
    private function getFasilId($name){
        return Fasilitator::where('name', $name)->first()->id ?? Fasilitator::where('name', 'Dwina Nugraheni')->first()->id;
    }

    private function getMedsos($data, $type){
        if ($type == 'ig') {
            if(Str::contains($data, 'Instagram')){
                $after = Str::after($data, 'InstagramNama : ');
                $before = Str::before($after, 'Url');
    
                return $before;
            }else{
                return null;
            }
        } else {
            if(Str::contains($data, 'Facebook')){
                $after = Str::after($data, 'FacebookNama : ');
                $before = Str::before($after, 'Url');
    
                return $before;
            }else{
                return null;
            }
        }
        
    }

    private function getMarketplace($data){
        if(Str::contains($data, 'Shopee')){
            $after = Str::after($data, 'ShopeeNama : ');
            $before = Str::before($after, 'Url');

            return $before;
        }if(Str::contains($data, 'Tokopedia')){
            $after = Str::after($data, 'TokopediaNama : ');
            $before = Str::before($after, 'Url');

            return $before;
        }if(Str::contains($data, 'bukalapak')){
            $after = Str::after($data, 'Url : ');
            $before = Str::before($after, ',Toko Online');

            return $before;
        }else{
            return null;
        }
    }

    private function getMarketplaceLink($data){
        if(Str::contains($data, 'Toko Online')){
            $after = Str::after($data, 'Url : ');
            $before = Str::before($after, ',Toko Online');

            return $before;
        }else{
            return null;
        }
    }

    private function ktpValidation($ktp){
        if($ktp == ""){
            return null;
        }
        if(Str::length($ktp) != 16){
            return null;
        }

        return $ktp;
    }
}
