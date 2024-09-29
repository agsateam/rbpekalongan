@extends('layouts.admin')
@section('title', 'Ubah Data UMKM')
@section('content')
<div class="md:px-5">
    <div class="flex flex-col md:flex-row justify-between">
        <h4 class="text-2xl md:text-3xl font-bold mb-5">Ubah Data UMKM</h4>
        <div class="breadcrumbs text-sm">
            <ul>
                <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li><a href="{{route('manage.umkm')}}">UMKM</a></li>
                <li>Ubah</li>
            </ul>
        </div>
    </div>

    <div class="flex justify-end mt-5">
        <a href="{{route('manage.umkm')}}" class="btn btn-sm bg-gray-500 text-white">Kembali</a>
    </div>

    <div class="flex flex-col border rounded-md p-5 mt-5">
        <form class="flex flex-col" action="{{route('manage.umkm.update')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{$data->id}}" name="id">
            <input type="hidden" value="{{$data->ktp_image}}" name="old_ktp">
            <input type="hidden" value="{{$data->npwp_image}}" name="old_npwp">
            <input type="hidden" value="{{$data->logo}}" name="old_logo">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-5">
                <label class="form-control w-full">
                    <div class="label">
                      <span class="label-text text-base font-semibold">Nama Usaha <span class="text-red-600 font-bold">*</span></span>
                    </div>
                    <input type="text" name="umkm" placeholder="Nama UMKM" value="{{$data->name}}" class="input input-bordered w-full" required/>
                </label>
                <label class="form-control w-full">
                    <div class="label">
                      <span class="label-text text-base font-semibold">Nama Pemilik <span class="text-red-600 font-bold">*</span></span>
                    </div>
                    <input type="text" name="owner" placeholder="Nama Pemilik" value="{{$data->owner}}" class="input input-bordered w-full" required/>
                </label>
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text text-base font-semibold">Jenis Usaha <span class="text-red-600 font-bold">*</span></span>
                    </div>
                    <select name="type" class="input input-bordered w-full" required>
                        <option value="Fashion" {{ $data->type == "Fashion" ? "selected" : "" }}>Fashion</option>
                        <option value="Kuliner" {{ $data->type == "Kuliner" ? "selected" : "" }}>Kuliner</option>
                        <option value="Kerajinan" {{ $data->type == "Kerajinan" ? "selected" : "" }}>Kerajinan</option>
                        <option value="Jasa" {{ $data->type == "Jasa" ? "selected" : "" }}>Jasa</option>
                    </select>
                </label>
                <label class="form-control w-full">
                    <div class="label">
                      <span class="label-text text-base font-semibold">Nomor WhatsApp <span class="text-red-600 font-bold">*</span></span>
                    </div>
                    <input type="text" name="whatsapp" placeholder="Nomor" value="{{$data->phone}}" class="input input-bordered w-full" required/>
                </label>
                <label class="form-control w-full lg:col-span-2">
                    <div class="label">
                        <span class="label-text text-base font-semibold">Deskripsi Usaha <span class="text-red-600 font-bold">*</span></span>
                    </div>
                    <input type="text" name="desc" placeholder="Contoh : usaha jual beli batik / produksi aneka olahan kerupuk ikan dll" value="{{$data->desc}}" class="input input-bordered w-full" required/>
                </label>
                <label class="form-control w-full lg:col-span-2">
                    <div class="label">
                        <span class="label-text text-base font-semibold">Alamat Lengkap <span class="text-red-600 font-bold">*</span></span>
                    </div>
                    <input type="text" name="address" placeholder="Alamat" value="{{$data->address}}" class="input input-bordered w-full" required/>
                </label>
                <label class="form-control w-full lg:col-span-2">
                    <div class="label">
                      <span class="label-text text-base font-semibold">Fasilitator yang dipilih</span>
                    </div>
                    <select name="fasilitator_id" class="input input-bordered w-full" required>
                        @foreach ($facilitators as $item)
                            <option value="{{$item->id}}" {{$data->fasilitator_id == $item->id ? 'selected' : ''}}>{{$item->name}}</option>
                        @endforeach
                    </select>
                </label>
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text text-base font-semibold">Nama Instagram</span>
                    </div>
                    <input type="text" name="instagram" placeholder="Instagram (Opsional)" value="{{$data->instagram}}" class="input input-bordered w-full"/>
                </label>
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text text-base font-semibold">Nama Facebook</span>
                    </div>
                    <input type="text" name="facebook" placeholder="Facebook (Opsional)" value="{{$data->facebook}}" class="input input-bordered w-full"/>
                </label>
                <label class="form-control w-full lg:col-span-2">
                    <div class="label">
                        <span class="label-text text-base font-semibold">Nama Toko Marketplace</span>
                    </div>
                    <input type="text" name="marketplace" placeholder="Nama Toko di Shopee/Tokopedia/Gofood/Grabfood (Opsional)" value="{{$data->marketplace}}" class="input input-bordered w-full"/>
                </label>
                <label class="form-control w-full lg:col-span-2">
                    <div class="label">
                        <span class="label-text text-base font-semibold">Link Toko Marketplace</span>
                    </div>
                    <input type="text" name="marketplace_link" placeholder="Link Shopee/Tokopedia/Gofood/Grabfood (Opsional)" value="{{$data->marketplace_link}}" class="input input-bordered w-full"/>
                </label>
                <label class="form-control w-full lg:col-span-2">
                    <div class="label">
                      <span class="label-text text-base font-semibold">Nomor KTP <span class="text-red-600 font-bold">*</span></span>
                    </div>
                    <input type="text" name="ktp" placeholder="Nomor KTP" value="{{$data->ktp}}" class="input input-bordered w-full" required/>
                </label>
                <label class="form-control w-full lg:col-span-2">
                    <div class="label">
                      <span class="label-text text-base font-semibold">Nomor NPWP</span>
                    </div>
                    <input type="text" name="npwp" placeholder="Nomor NPWP (Opsional)" value="{{$data->npwp}}" class="input input-bordered w-full"/>
                </label>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 md:gap-5 mt-5">
                <div class="w-full flex flex-col">
                    <label class="form-control w-full">
                        <div class="label">
                          <span class="label-text text-base font-semibold">Upload KTP</span>
                        </div>
                        <input type="file" accept="image/*" onchange="loadFile(event, 'ktp')" name="ktp_image" class="input input-bordered w-full h-10"/>
                        @error('ktp_image')
                        <span class="text-red-600 text-sm mt-1 ml-1">{{ $message }}</span>
                        @enderror
                    </label>
                    <img id="output_ktp" src="{{$data->ktp_image ?? url('images/preview-image.jpg')}}" class="rounded-md w-2/3 mt-3">
                </div>
                <div class="w-full flex flex-col">
                    <label class="form-control w-full">
                        <div class="label">
                          <span class="label-text text-base font-semibold">Upload NPWP <span class="text-gray-500 font-normal ml-2">* opsional</span></span>
                        </div>
                        <input type="file" accept="image/*" onchange="loadFile(event, 'npwp')" name="npwp_image" class="input input-bordered w-full h-10"/>
                        @error('npwp_image')
                        <span class="text-red-600 text-sm mt-1 ml-1">{{ $message }}</span>
                        @enderror
                    </label>
                    <img id="output_npwp" src="{{$data->npwp_image ?? url('images/preview-image.jpg')}}" class="rounded-md w-2/3 mt-3">
                </div>
                <div class="w-full flex flex-col">
                    <label class="form-control w-full">
                        <div class="label">
                          <span class="label-text text-base font-semibold">Logo UMKM <span class="text-gray-500 font-normal ml-2">* opsional</span></span>
                        </div>
                        <input type="file" accept="image/*" onchange="loadFile(event, 'logo')" name="logo" class="input input-bordered w-full h-10"/>
                        @error('logo')
                        <span class="text-red-600 text-sm mt-1 ml-1">{{ $message }}</span>
                        @enderror
                    </label>
                    <img id="output_logo" src="{{$data->logo ?? url('images/preview-image.jpg')}}" class="rounded-md w-2/3 mt-3">
                </div>
            </div>

            <button type="submit" class="btn btn-lg bg-[#195770] text-white w-full md:w-1/3 mt-5">Simpan Perubahan</button>
        </form>
    </div>
</div>
@endsection

@section('script')
<script>
    var loadFile = function(event, output) {
        var output = document.getElementById('output_' + output);
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
    };
</script>
@endsection