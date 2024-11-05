@php
$certs = explode(",", $data->certification);
@endphp

@extends('layouts.admin')
@section('title', 'Tambah Fasilitator')
@section('content')
<div class="md:px-5">
    <div class="flex flex-col md:flex-row justify-between">
        <h4 class="text-2xl md:text-3xl font-bold mb-5">Edit Data</h4>
        <div class="breadcrumbs text-sm">
            <ul>
                <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li>Fasilitator</li>
                <li>Edit Data</li>
            </ul>
        </div>
    </div>
    
    <div class="flex justify-end mt-5">
        <a href="{{route('manage.fasilitator')}}" class="btn btn-sm bg-gray-500 text-white">Kembali</a>
    </div>

    <div class="flex flex-col border rounded-md p-5 mt-5">
        <form class="flex flex-col" action="{{route('manage.fasilitator.update')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$data->id}}">
            <input type="hidden" name="old_photo" value="{{$data->photo}}">
            <label class="form-control w-full">
                <div class="label">
                  <span class="label-text text-base font-semibold">Nama <span class="text-red-600 font-bold">*</span></span>
                </div>
                <input type="text" name="nama" placeholder="Nama" value="{{$data->name}}" class="input input-bordered w-full" required/>
            </label>
            <label class="form-control w-full mt-5">
                <div class="label">
                    <span class="label-text text-base font-semibold">Sertifikasi</span>
                </div>
                <div class="w-full flex flex-col gap-1">
                    @foreach ($certs as $index => $item)
                    <input type="text" name="certification{{$index+1}}" value="{{$item}}" placeholder="Nama Sertifikasi" class="input input-bordered w-full" {{$index == 0 ? 'required' : ''}}/>
                    @endforeach
                    
                    @for ($i = (count($certs)+1); $i <= 20; $i++)
                    <input type="hidden" id="cert{{$i}}" name="certification{{$i}}" placeholder="Nama Sertifikasi" class="input input-bordered w-full"/>
                    @endfor
                </div>
                <input type="hidden" id="showedCount" value="{{count($certs)}}">
                <input id="buttonAddRow" type="button" class="text-[#195770] font-bold w-fit mt-2 cursor-pointer" onclick="addRow()" value="+ Tambah Sertifikasi">
            </label>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mt-5">
                <label class="form-control w-full mt-2">
                    <div class="label">
                      <span class="label-text text-base font-semibold">Foto</span>
                    </div>
                    <input type="file" accept="image/*" onchange="loadFile(event)" name="photo" class="input input-bordered w-full">
                </label>
                <div class="w-full flex justify-center mt-5">
                    <img id="output" src="{{$data->photo}}" class="w-1/2">
                </div>
            </div>
            <button class="btn bg-[#195770] mt-10 text-white">Simpan</button>
        </form>
    </div>
</div>
@endsection

@section('script')
<script>
    function addRow(){
        let rowCount = document.querySelector("#showedCount");
        let nextInput = document.querySelector("#cert" + (parseInt(rowCount.value)+1));

        nextInput.type = "text";
        nextInput.focus();

        rowCount.value = parseInt(rowCount.value) + 1;
        if(parseInt(rowCount.value) == 20){
            document.querySelector("#buttonAddRow").type = "hidden";
        }
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