@php
$umkm_id = request()->umkm ?? null;
@endphp

@extends('layouts.admin')
@section('title', 'Tambah Produk')

@section('content')
<div class="md:px-5">
    <div class="flex flex-col md:flex-row justify-between">
        <h4 class="text-2xl md:text-3xl font-bold mb-5">Tambah Data Produk</h4>
        <div class="breadcrumbs text-sm">
            <ul>
                <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li><a href="{{route('manage.umkm')}}">UMKM</a></li>
                <li><a href="{{route('manage.product')}}">Produk</a></li>
                <li>Tambah</li>
            </ul>
        </div>
    </div>

    <div class="flex justify-end mt-5">
        <a href="{{route('manage.product')}}" class="btn btn-sm bg-gray-500 text-white">Kembali</a>
    </div>

    <div class="flex flex-col border rounded-md p-5 mt-5">
        <form class="flex flex-col" action="{{route('manage.product.save')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mt-2">
                <label class="form-control w-full">
                    <div class="label">
                      <span class="label-text text-base font-semibold">UMKM <span class="text-red-600 font-bold">*</span></span>
                    </div>
                    <select name="umkm_id" class="input input-bordered w-full" required>
                        <option disabled selected>Pilih UMKM</option>
                        @foreach ($umkm as $item)
                            <option value="{{$item->id}}" {{($umkm_id == $item->id) || (old('umkm_id') == $item->id) ? 'selected' : ''}}>{{$item->name}}</option>
                        @endforeach
                    </select>
                    @error('umkm_id')
                        <span class="text-red-600 text-xs mt-1 ml-1">{{ $message }}</span>
                    @enderror
                </label>
                <label class="form-control w-full col-span-2">
                    <div class="label">
                      <span class="label-text text-base font-semibold">Nama Produk <span class="text-red-600 font-bold">*</span></span>
                    </div>
                    <input type="text" name="name" placeholder="Nama" value="{{old('name')}}" class="input input-bordered w-full" required/>
                    @error('name')
                        <span class="text-red-600 text-xs mt-1 ml-1">{{ $message }}</span>
                    @enderror
                </label>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mt-2">
                <label class="form-control w-full">
                    <div class="label">
                      <span class="label-text text-base font-semibold">Kategori <span class="text-red-600 font-bold">*</span></span>
                    </div>
                    <select name="product_category_id" class="input input-bordered w-full" required>
                        <option disabled selected>Pilih Kategori</option>
                        @foreach ($categories as $item)
                            <option value="{{$item->id}}" {{(old('product_category_id') == $item->id) ? 'selected' : '' }}>{{$item->name}}</option>
                        @endforeach
                    </select>
                    @error('product_category_id')
                        <span class="text-red-600 text-xs mt-1 ml-1">{{ $message }}</span>
                    @enderror
                </label>
                <label class="form-control w-full">
                    <div class="label">
                      <span class="label-text text-base font-semibold">Harga <span class="text-red-600 font-bold">*</span></span>
                    </div>
                    <input type="number" name="price" placeholder="Harga" value="{{old('price')}}" class="input input-bordered w-full" required/>
                    @error('price')
                        <span class="text-red-600 text-xs mt-1 ml-1">{{ $message }}</span>
                    @enderror
                </label>
                <label class="form-control w-full">
                    <div class="label">
                      <span class="label-text text-base font-semibold">Link Marketplace</span>
                    </div>
                    <input type="text" name="link" placeholder="Link (Opsional)" value="{{old('link')}}" class="input input-bordered w-full"/>
                </label>
            </div>
            <label class="form-control w-full mt-2">
                <div class="label">
                  <span class="label-text text-base font-semibold">Deskripsi Produk <span class="text-red-600 font-bold">*</span></span>
                </div>
                <textarea name="desc" placeholder="Isi deskripsi produk" class="input input-bordered w-full h-24" required>{{old('desc')}}</textarea>
                @error('desc')
                    <span class="text-red-600 text-xs mt-1 ml-1">{{ $message }}</span>
                @enderror
            </label>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mt-2">
                <label class="form-control w-full mt-2">
                    <div class="label">
                      <span class="label-text text-base font-semibold">Foto Produk</span>
                    </div>
                    <input type="file" accept="image/*" onchange="loadFile(event)" name="photo" class="input input-bordered w-full">
                </label>
                <div class="w-full flex justify-center mt-5">
                    <img id="output" src="{{url('images/preview-image.jpg')}}" class="w-1/2">
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
            URL.revokeObjectURL(output.src)
        }
    };
</script>
@endsection