@extends('layouts.admin')
@section('title', 'Edit Event')
@section('content')

<div class="md:px-5">
    <div class="flex flex-col md:flex-row justify-between">
        <h4 class="text-2xl md:text-3xl font-bold mb-5">Edit Event</h4>
        <div class="breadcrumbs text-sm">
            <ul>
                <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li><a href="{{route('manage.event')}}">Event</a></li>
                <li>Edit</li>
            </ul>
        </div>
    </div>

    <div class="flex justify-end mt-5">
        <a href="{{route('manage.event')}}" class="btn btn-sm bg-gray-500 text-white">Kembali</a>
    </div>

    <div class="flex flex-col border rounded-md p-5 mt-5">
        <form class="flex flex-col" action="{{route('manage.event.update')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$data->id}}"/>
            <input type="hidden" name="old_poster" value="{{$data->poster}}"/>
            <label class="form-control w-full">
                <div class="label">
                  <span class="label-text text-base font-semibold">Nama Event <span class="text-red-600 font-bold">*</span></span>
                </div>
                <input type="text" name="nama" value="{{ $data->name }}" placeholder="Nama" class="input input-bordered w-full" required/>
            </label>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mt-2">
                <label class="form-control w-full">
                    <div class="label">
                      <span class="label-text text-base font-semibold">Tanggal & Waktu <span class="text-red-600 font-bold">*</span></span>
                    </div>
                    <input type="datetime-local" name="date" id="form-date" placeholder="Tanggal" class="input input-bordered w-full" required>
                </label>
                <label class="form-control w-full">
                    <div class="label">
                      <span class="label-text text-base font-semibold">Lokasi <span class="text-red-600 font-bold">*</span></span>
                    </div>
                    <input type="text" name="location" value="{{ $data->location }}" placeholder="Lokasi" class="input input-bordered w-full" required>
                </label>
            </div>
            <label class="form-control w-full mt-2">
                <div class="label">
                  <span class="label-text text-base font-semibold">Deskripsi Event <span class="text-red-600 font-bold">*</span></span>
                </div>
                <textarea name="deskripsi" placeholder="Deskripsi" class="input input-bordered w-full h-24" required>{{ $data->deskripsi }}</textarea>
            </label>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mt-2">
                <label class="form-control w-full mt-2">
                    <div class="label">
                      <span class="label-text text-base font-semibold">Poster</span>
                    </div>
                    <input type="file" accept="image/*" onchange="loadFile(event)" name="poster" class="input input-bordered w-full">
                </label>
                <div class="w-full flex justify-center mt-5">
                    <img id="output" src="{{ $data->poster }}" class="w-1/2">
                </div>
            </div>
            <button type="submit" class="btn bg-[#195770] text-white mt-5">Simpan</button>
        </form>
    </div>
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

    window.addEventListener("load", function() {
        let currentDate = '{{ $data->date . " " . $data->time }}' + ":00";
        var now = new Date(currentDate.replace(".", ":"));
        var offset = now.getTimezoneOffset() * 60000;
        var adjustedDate = new Date(now.getTime() - offset);
        var formattedDate = adjustedDate.toISOString().substring(0,16); // For minute precision
        var datetimeField = document.getElementById("form-date");
        datetimeField.value = formattedDate;
    });
</script>
@endsection