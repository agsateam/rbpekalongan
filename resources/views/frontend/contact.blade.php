@extends('layouts.master')
@section('title', 'Hubungi Kami')
@section('content')

<div class="pt-16 pb-10">
    <div class="max-w-screen-xl mx-8 md:mx-14 2xl:mx-auto">
        <h4 class="text-4xl md:text-5xl font-bold">Hubungi Kami</h4>
    </div>
</div>
    
<div class="py-10 bg-gray-100">
    <div class="max-w-screen-xl mx-8 md:mx-14 2xl:mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 lg:gap-0">
            <div class="flex flex-col border-l-4 pl-5 border-[#195770]">
                <span class="text-gray-500 font-semibold">HP/WhatsApp</span>
                <span class="text-2xl font-bold text-[#195770]">08150021000</span>
            </div>
            <div class="flex flex-col border-l-4 pl-5 border-[#195770]">
                <span class="text-gray-500 font-semibold">Email</span>
                <span class="text-2xl font-bold text-[#195770]">example@mail.com</span>
            </div>
            <div class="flex flex-col border-l-4 pl-5 border-[#195770]">
                <span class="text-gray-500 font-semibold">Alamat</span>
                <span class="text-2xl font-bold text-[#195770]">Jl. Merak No.2, Kandang Panjang</span>
            </div>
        </div>
    </div>
</div>

<div class="pt-10 pb-16">
    <div class="flex flex-col max-w-screen-xl mx-8 md:mx-14 2xl:mx-auto">
        <h4 class="text-3xl font-bold">Bergabung Bersama Kami</h4>
        <span class="text-xl my-5">Ingin bergabung menjadi UMKM binaan Rumah BUMN Pekalongan? fasilitator berikut akan membimbing anda.</span>
        @if(count($facilitators) < 1) <span class="text-2xl font-semibold">Belum ada data fasilitator</span> @endif
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            @foreach ($facilitators as $item)
            <div class="flex flex-col md:flex-row md:grid-cols-5 p-5 border-4 shadow-md rounded-md">
                <img src="{{$item->photo}}" class="w-full md:w-1/3 md:h-fit">
                <div class="md:w-2/3 flex flex-col md:ml-5 mt-3 md:mt-0">
                    <span class="text-3xl font-bold">{{$item->name}}</span>
                    <span class="text-xl font-bold mt-1">Sertifikasi</span>
                    <p>
                        @foreach (explode(",", $item->certification) as $cert)
                            <li>{{$cert}}</li>
                        @endforeach
                    </p>
                    <a href="#form-regist" class="mt-2 btn bg-[#195770] text-white" onclick="selected('{{$item->id}}', '{{$item->name}}')">Pilih Fasilitator Ini</a>
                </div>
            </div>
            @endforeach
        </div>

        <form class="{{$errors->any() ? 'block' : 'hidden'}} flex-col pt-32" action="{{route('umkm.regist')}}" method="post" enctype="multipart/form-data" id="form-regist">
            <span class="text-2xl mb-3 font-semibold">Form Registrasi UMKM</span>
            @csrf
            <input type="hidden" value="{{old('mentor_id')}}" name="mentor_id" id="mentor_id">
            <div class="grid grid-cols-1 lg:grid-cols-5 gap-5">
                <label class="form-control w-full">
                    <div class="label">
                      <span class="label-text text-base font-semibold">Nama Usaha <span class="text-red-600 font-bold">*</span></span>
                    </div>
                    <input type="text" name="umkm" placeholder="Nama UMKM" value="{{old('umkm')}}" class="input input-bordered w-full" required/>
                </label>
                <label class="form-control w-full">
                    <div class="label">
                      <span class="label-text text-base font-semibold">Nama Pemilik <span class="text-red-600 font-bold">*</span></span>
                    </div>
                    <input type="text" name="owner" placeholder="Nama Pemilik" value="{{old('owner')}}" class="input input-bordered w-full" required/>
                </label>
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text text-base font-semibold">Jenis Usaha <span class="text-red-600 font-bold">*</span></span>
                    </div>
                    <select name="type" class="input input-bordered w-full" required>
                        <option value="Fashion" {{ old("type") == "Fashion" ? "selected" : "" }}>Fashion</option>
                        <option value="Kuliner" {{ old("type") == "Kuliner" ? "selected" : "" }}>Kuliner</option>
                        <option value="Kerajinan" {{ old("type") == "Kerajinan" ? "selected" : "" }}>Kerajinan</option>
                        <option value="Jasa" {{ old("type") == "Jasa" ? "selected" : "" }}>Jasa</option>
                    </select>
                </label>
                <label class="form-control w-full">
                    <div class="label">
                      <span class="label-text text-base font-semibold">Nomor WhatsApp <span class="text-red-600 font-bold">*</span></span>
                    </div>
                    <input type="text" inputmode="numeric" name="whatsapp" placeholder="Nomor" value="{{old('whatsapp')}}" class="input input-bordered w-full" required/>
                </label>
                <label class="form-control w-full">
                    <div class="label">
                      <span class="label-text text-base font-semibold">Fasilitator yang dipilih</span>
                    </div>
                    <input id="mentor" type="text" name="mentor" placeholder="Mentor" value="{{old('mentor')}}" class="input input-bordered w-full" readonly required/>
                </label>
                <label class="form-control w-full lg:col-span-2">
                    <div class="label">
                        <span class="label-text text-base font-semibold">Deskripsi Usaha <span class="text-red-600 font-bold">*</span></span>
                    </div>
                    <input type="text" name="desc" placeholder="Contoh : usaha jual beli batik / produksi aneka olahan kerupuk ikan dll" value="{{old('desc')}}" class="input input-bordered w-full" required/>
                </label>
                <label class="form-control w-full lg:col-span-3">
                    <div class="label">
                        <span class="label-text text-base font-semibold">Alamat Lengkap <span class="text-red-600 font-bold">*</span></span>
                    </div>
                    <input type="text" name="address" placeholder="Alamat" value="{{old('address')}}" class="input input-bordered w-full" required/>
                </label>
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text text-base font-semibold">Nama Instagram</span>
                    </div>
                    <input type="text" name="instagram" placeholder="Instagram (Opsional)" value="{{old('instagram')}}" class="input input-bordered w-full"/>
                </label>
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text text-base font-semibold">Nama Facebook</span>
                    </div>
                    <input type="text" name="facebook" placeholder="Facebook (Opsional)" value="{{old('facebook')}}" class="input input-bordered w-full"/>
                </label>
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text text-base font-semibold">Nama Toko Marketplace</span>
                    </div>
                    <input type="text" name="marketplace" placeholder="Nama Toko di Shopee/Tokopedia/Gofood/Grabfood (Opsional)" value="{{old('marketplace')}}" class="input input-bordered w-full"/>
                </label>
                <label class="form-control w-full lg:col-span-2">
                    <div class="label">
                        <span class="label-text text-base font-semibold">Link Toko Marketplace</span>
                    </div>
                    <input type="text" name="marketplace_link" placeholder="Link Shopee/Tokopedia/Gofood/Grabfood (Opsional)" value="{{old('marketplace_link')}}" class="input input-bordered w-full"/>
                </label>
                <label class="form-control w-full lg:col-span-2">
                    <div class="label">
                      <span class="label-text text-base font-semibold">Nomor KTP <span class="text-red-600 font-bold">*</span></span>
                    </div>
                    <input type="text" inputmode="numeric" name="ktp" placeholder="Nomor KTP" value="{{old('ktp')}}" class="input input-bordered w-full" required/>
                </label>
                <label class="form-control w-full lg:col-span-3">
                    <div class="label">
                      <span class="label-text text-base font-semibold">Nomor NPWP</span>
                    </div>
                    <input type="text" name="npwp" placeholder="Nomor NPWP (Opsional)" value="{{old('npwp')}}" class="input input-bordered w-full"/>
                </label>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 md:gap-5 mt-3">
                <div class="w-full flex flex-col">
                    <label class="form-control w-full">
                        <div class="label">
                          <span class="label-text text-base font-semibold">Upload KTP <span class="text-red-600 font-bold">*</span></span>
                        </div>
                        <input type="file" accept="image/*" onchange="loadFile(event, 'ktp')" name="ktp_image" class="input input-bordered w-full h-10" required/>
                        @error('ktp_image')
                        <span class="text-red-600 text-sm mt-1 ml-1">{{ $message }}</span>
                        @enderror
                    </label>
                    <img id="output_ktp" src="{{url('images/preview-image.jpg')}}" class="rounded-md w-2/3 mt-3">
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
                    <img id="output_npwp" src="{{url('images/preview-image.jpg')}}" class="rounded-md w-2/3 mt-3">
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
                    <img id="output_logo" src="{{url('images/preview-image.jpg')}}" class="rounded-md w-2/3 mt-3">
                </div>
            </div>
            <div class="w-full flex flex-col items-center justify-center mt-10">
                {!! NoCaptcha::renderJs() !!}
                {!! NoCaptcha::display() !!}
                @error('g-recaptcha-response')
                <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>
            <div class="w-full inline-flex justify-center mt-10">
                <button type="submit" class="btn btn-lg bg-[#195770] text-white w-full md:w-1/3">
                    Kirim Pendaftaran
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m12.75 15 3-3m0 0-3-3m3 3h-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                </button>
            </div>
        </form>
    </div>    
</div>

@endsection


@section('script')
<script>
    function selected(mentor_id, mentor){
        let form = document.getElementById("form-regist");
        let input_mentor_id = document.getElementById("mentor_id");
        let input_mentor = document.getElementById("mentor");

        input_mentor_id.value = mentor_id;
        input_mentor.value = mentor;
        
        form.classList.remove('hidden');
        form.classList.add('flex');
    }

    var loadFile = function(event, output) {
        var output = document.getElementById('output_' + output);
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
    };
</script>
@endsection