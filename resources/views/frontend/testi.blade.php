@extends('layouts.master')
@section('title', 'Kirim Testimoni')
@section('content')

<div class="py-16">
    <div class="max-w-screen-xl mx-8 md:mx-14 2xl:mx-auto">
        <div class="flex flex-row justify-between items-center mb-5">
            <h4 class="text-xl md:text-4xl font-bold">Kirim Testimoni</h4>
            <a href="{{route('home')}}" class="btn btn-sm bg-[#195770] text-white">Kembali</a>
        </div>

        <form action="{{route('testi.send')}}" method="post" class="border rounded-md p-5">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div class="flex flex-col">
                    <label class="form-control w-full">
                        <div class="label">
                          <span class="label-text text-base font-semibold">Nama anda <span class="text-red-600 font-bold">*</span></span>
                        </div>
                        <input type="text" name="name" placeholder="Nama" value="{{old('name')}}" class="input input-bordered w-full" required/>
                        @error('name')
                        <span class="text-red-600 text-sm mt-1 ml-1">{{ $message }}</span>
                        @enderror
                    </label>
                    <label class="form-control w-full mt-2">
                        <div class="label">
                          <span class="label-text text-base font-semibold">Gender anda <span class="text-red-600 font-bold">*</span></span>
                        </div>
                        <select name="gender" class="input input-bordered w-full" required>
                            <option value="lk" {{ old("gender") == "lk" ? "selected" : "" }}>Laki-laki</option>
                            <option value="pr" {{ old("gender") == "pr" ? "selected" : "" }}>Perempuan</option>
                        </select>
                        @error('gender')
                        <span class="text-red-600 text-sm mt-1 ml-1">{{ $message }}</span>
                        @enderror
                    </label>
                    <label class="form-control w-full mt-2">
                        <div class="label">
                          <span class="label-text text-base font-semibold">UMKM <span class="text-red-600 font-bold">*</span></span>
                        </div>
                        <input type="text" name="umkm" placeholder="Nama Usaha" value="{{old('umkm')}}" class="input input-bordered w-full" required/>
                        @error('umkm')
                        <span class="text-red-600 text-sm mt-1 ml-1">{{ $message }}</span>
                        @enderror
                    </label>
                </div>
                <label class="form-control w-full">
                    <div class="label">
                      <span class="label-text text-base font-semibold">Pesan Testimoni <span class="text-red-600 font-bold">*</span></span>
                    </div>
                    <textarea name="testimoni" placeholder="Pesan ..." class="input input-bordered w-full h-32 md:h-56" required>{{old('testimoni')}}</textarea>
                    @error('testimoni')
                    <span class="text-red-600 text-sm mt-1 ml-1">{{ $message }}</span>
                    @enderror
                </label>
            </div>
            <button class="btn bg-[#195770] text-white mt-5 w-full">Kirim</button>
        </form>
    </div>
</div>
@endsection