@php
function toDate($date){
    return Carbon\Carbon::createFromDate($date)->format('d M Y');
}
@endphp

@extends('layouts.master')
@section('title', 'Regist Event')
@section('content')

<div class="py-16">
    <div class="max-w-screen-xl mx-8 md:mx-14 2xl:mx-auto">
        <div class="flex flex-row justify-between items-center">
            <h4 class="text-3xl md:text-4xl font-bold mb-5">Registrasi Event</h4>
            <a href="/event" class="btn btn-sm bg-[#195770] text-white">Kembali</a>
        </div>

        <div class="bg-white border rounded-md p-5">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div class="flex flex-col">
                    <span class="text-2xl font-semibold mb-5">Detail Event</span>
                    <img src="{{ $data['poster'] }}" class="rounded-md w-3/4 mb-3">
                    <span class="text-lg font-bold">{{ $data['name'] }}</span>
                    <span class="font-semibold mt-3 flex">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        {{ toDate($data['date']) }} | {{ $data['time'] }}
                    </span>
                    <span class="font-semibold flex mt-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                        </svg>                                      
                        {{ $data['location'] }}
                    </span>
                </div>

                <form class="flex flex-col mt-10 md:mt-0" action="{{route('event.regist.send')}}" method="post">
                    @csrf
                    <span class="text-2xl font-semibold mb-5">Form Data Diri</span>
                    <label class="form-control w-full">
                        <div class="label">
                          <span class="label-text text-base font-semibold">Nama anda <span class="text-red-600 font-bold">*</span></span>
                        </div>
                        <input type="text" name="nama" placeholder="Nama" class="input input-bordered w-full" required/>
                    </label>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mt-2">
                        <label class="form-control w-full">
                            <div class="label">
                              <span class="label-text text-base font-semibold">Gender <span class="text-red-600 font-bold">*</span></span>
                            </div>
                            <select name="gender" class="input input-bordered w-full" required>
                                <option value="lk">Laki-laki</option>
                                <option value="pr">Perempuan</option>
                            </select>
                        </label>
                        <label class="form-control w-full">
                            <div class="label">
                              <span class="label-text text-base font-semibold">Umur</span>
                            </div>
                            <input type="number" name="umur" placeholder="Umur" class="input input-bordered w-full">
                        </label>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mt-2">
                        <label class="form-control w-full">
                            <div class="label">
                              <span class="label-text text-base font-semibold">Alamat</span>
                            </div>
                            <input type="text" name="alamat" placeholder="Alamat" class="input input-bordered w-full">
                        </label>
                        <label class="form-control w-full">
                            <div class="label">
                              <span class="label-text text-base font-semibold">Nomor HP/WA <span class="text-red-600 font-bold">*</span></span>
                            </div>
                            <input type="text" name="phone" placeholder="Nomor" class="input input-bordered w-full" required>
                        </label>
                    </div>
                    <label class="form-control w-full mt-2">
                        <div class="label">
                          <span class="label-text text-base font-semibold">Anda mempunyai UMKM ? <span class="text-red-600 font-bold">*</span></span>
                        </div>
                        <select id="haveUmkm" name="is_have_umkm" class="input input-bordered w-full" onchange="haveUMKM()" required>
                            <option value="1">Ya</option>
                            <option value="0" selected>Tidak</option>
                        </select>
                    </label>
                    <label class="form-control w-full mt-2">
                        <div class="label">
                          <span class="label-text text-base font-semibold">Nama UMKM</span>
                        </div>
                        <input id="umkm" type="text" name="umkm" placeholder="UMKM" class="input input-bordered w-full" disabled/>
                    </label>
                    <button type="submit" class="btn bg-[#195770] text-white mt-5">Daftar</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
    <script>
        function haveUMKM(){
            var isHaveUmkm = document.getElementById('haveUmkm').value;
            var umkmName = document.getElementById('umkm');
            
            if(isHaveUmkm == 1){
                umkmName.disabled = false;
                umkmName.required = true;
            }else{
                umkmName.disabled = true;
                umkmName.required = false;
            }
        }
    </script>
@endsection