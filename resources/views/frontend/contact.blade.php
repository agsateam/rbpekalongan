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
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div class="flex flex-col md:flex-row md:grid-cols-5 p-5 border-4 shadow-md rounded-md">
                <img src="https://iili.io/dsiNrCX.png" class="w-full md:w-1/3 md:h-fit">
                <div class="md:w-2/3 flex flex-col md:ml-5 mt-3 md:mt-0">
                    <span class="text-3xl font-bold">Vina Panduwinata</span>
                    <span class="text-xl font-bold mt-1">Sertifikasi</span>
                    <p>
                        1. Nama Sertifikasi Satu <br>
                        2. Nama Sertifikasi Satu <br>
                        3. Nama Sertifikasi Satu <br>
                        4. Nama Sertifikasi Satu <br>
                    </p>
                    <button class="mt-2 btn bg-[#195770] text-white" onclick="selected(1, 'Vina Panduwinata')">Pilih</button>
                </div>
            </div>
            <div class="flex flex-col md:flex-row md:grid-cols-5 p-5 border-4 shadow-md rounded-md">
                <img src="https://iili.io/dsiNrCX.png" class="w-full md:w-1/3 md:h-fit">
                <div class="md:w-2/3 flex flex-col md:ml-5 mt-3 md:mt-0">
                    <span class="text-3xl font-bold">Dewi</span>
                    <span class="text-xl font-bold mt-1">Sertifikasi</span>
                    <p>
                        1. Nama Sertifikasi Satu <br>
                        2. Nama Sertifikasi Satu <br>
                        3. Nama Sertifikasi Satu <br>
                        4. Nama Sertifikasi Satu <br>
                    </p>
                    <button class="mt-2 btn bg-[#195770] text-white" onclick="selected(2, 'Dewi')">Pilih</button>
                </div>
            </div>
        </div>

        <form class="hidden flex-col mt-16" action="{{route('umkm.regist')}}" method="post" enctype="multipart/form-data" id="form-regist">
            <span class="text-2xl mb-3 font-semibold">Form Registrasi UMKM</span>
            @csrf
            <input type="hidden" name="mentor_id" id="mentor_id">
            <div class="grid grid-cols-1 md:grid-cols-4 md:md:gap-5">
                <label class="form-control w-full">
                    <div class="label">
                      <span class="label-text text-base font-semibold">Nama UMKM <span class="text-red-600 font-bold">*</span></span>
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
                      <span class="label-text text-base font-semibold">Nomor WhatsApp <span class="text-red-600 font-bold">*</span></span>
                    </div>
                    <input type="text" name="whatsapp" placeholder="Nomor" value="{{old('whatsapp')}}" class="input input-bordered w-full" required/>
                </label>
                <label class="form-control w-full">
                    <div class="label">
                      <span class="label-text text-base font-semibold">Pilih Fasilitator</span>
                    </div>
                    <input id="mentor" type="text" name="mentor" placeholder="Mentor" value="{{old('mentor')}}" class="input input-bordered w-full" readonly required/>
                </label>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-4 md:gap-5 mt-3">
                <label class="form-control w-full">
                    <div class="label">
                      <span class="label-text text-base font-semibold">NPWP <span class="text-red-600 font-bold">*</span></span>
                    </div>
                    <input type="text" name="npwp" placeholder="NPWP" value="{{old('npwp')}}" class="input input-bordered w-full" required/>
                </label>
                <label class="form-control w-full col-span-3">
                    <div class="label">
                      <span class="label-text text-base font-semibold">Alamat <span class="text-red-600 font-bold">*</span></span>
                    </div>
                    <input type="text" name="address" placeholder="Alamat" value="{{old('address')}}" class="input input-bordered w-full" required/>
                </label>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-4 md:gap-5 mt-3">
                <label class="form-control w-full col-span-2">
                    <div class="label">
                      <span class="label-text text-base font-semibold">Tujuan/Harapan Bergabung <span class="text-red-600 font-bold">*</span></span>
                    </div>
                    <textarea name="join_reason" placeholder="Tujuan/Harapan ..." value="{{old('join_reason')}}" class="input input-bordered w-full h-28 md:h-64" required></textarea>
                </label>
                <div class="w-full flex flex-col col-span-2">
                    <label class="form-control w-full">
                        <div class="label">
                          <span class="label-text text-base font-semibold">Logo UMKM <span class="text-red-600 font-bold">*</span></span>
                        </div>
                        <input type="file" accept="image/*" onchange="loadFile(event)" name="logo" class="input input-bordered w-full h-10" required/>
                    </label>
                    <img id="output" src="{{url('images/preview-image.jpg')}}" class="rounded-md w-1/2 md:w-1/3 mt-3">
                </div>
            </div>
            <button type="submit" class="btn btn-lg bg-[#195770] text-white md:w-1/3 mt-5">Daftar UMKM Binaan</button>
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

    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
    };
</script>
@endsection