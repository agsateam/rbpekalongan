@extends('layouts.admin')
@section('title', 'Kelola Event')
@section('content')

<div class="md:px-5">
    <div class="flex justify-between">
        <h4 class="text-2xl md:text-3xl font-bold mb-5">Buat Event</h4>
        <div class="breadcrumbs text-sm">
            <ul>
                <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li><a href="{{route('manage.event')}}">Event</a></li>
                <li>Buat</li>
            </ul>
        </div>
    </div>

    <form class="flex flex-col mt-10 md:mt-0" action="{{route('manage.event.save')}}" method="post" enctype="multipart/form-data">
        @csrf
        <label class="form-control w-full">
            <div class="label">
              <span class="label-text text-base font-semibold">Nama Event <span class="text-red-600 font-bold">*</span></span>
            </div>
            <input type="text" name="nama" placeholder="Nama" class="input input-bordered w-full" required/>
        </label>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mt-2">
            <label class="form-control w-full">
                <div class="label">
                  <span class="label-text text-base font-semibold">Tanggal & Waktu <span class="text-red-600 font-bold">*</span></span>
                </div>
                <input type="datetime-local" name="date" placeholder="Tanggal" class="input input-bordered w-full" required>
            </label>
            <label class="form-control w-full">
                <div class="label">
                  <span class="label-text text-base font-semibold">Lokasi <span class="text-red-600 font-bold">*</span></span>
                </div>
                <input type="text" name="location" placeholder="Lokasi" class="input input-bordered w-full" required>
            </label>
        </div>
        <label class="form-control w-full mt-2">
            <div class="label">
              <span class="label-text text-base font-semibold">Deskripsi Event <span class="text-red-600 font-bold">*</span></span>
            </div>
            <textarea name="deskripsi" placeholder="Deskripsi" class="input input-bordered w-full h-24" required></textarea>
        </label>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mt-2">
            <label class="form-control w-full mt-2">
                <div class="label">
                  <span class="label-text text-base font-semibold">Poster <span class="text-red-600 font-bold">*</span></span>
                </div>
                <input type="file" accept="image/*" onchange="loadFile(event)" name="poster" class="input input-bordered w-full" required>
            </label>
            <div class="w-full flex justify-center mt-5">
                <img id="output" src="{{url('images/preview-image.jpg')}}" class="w-1/2">
            </div>
        </div>
        <button type="submit" class="btn bg-[#195770] text-white mt-5">Simpan</button>
    </form>
</div>

@endsection

@section('script')
<script>
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
    };
</script>
@endsection