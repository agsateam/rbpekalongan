@extends('layouts.admin')
@section('title', 'Detail Produk')
@section('content')
<div class="md:px-5">
    <div class="flex flex-col md:flex-row justify-between">
        <h4 class="text-2xl md:text-3xl font-bold mb-5">Detail Produk</h4>
        <div class="breadcrumbs text-sm">
            <ul>
                <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li><a href="{{route('manage.umkm')}}">UMKM</a></li>
                <li><a href="{{route('manage.product')}}">Produk</a></li>
                <li>Detail</li>
            </ul>
        </div>
    </div>

    <div class="flex justify-end mt-5">
        <a href="{{route('manage.product')}}" class="btn btn-sm bg-gray-500 text-white">Kembali</a>
    </div>

    @include('components.backend.alert')

    <div class="flex flex-col border rounded-md p-5 mt-5">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-2 md:gap-5">
            <div class="flex flex-col">
                <span class="font-semibold text-gray-500">Nama Produk</span>
                <span class="text-xl font-bold">{{ $data->name }}</span>
            </div>
            <div class="flex flex-col">
                <span class="font-semibold text-gray-500">Kategori</span>
                <a href="{{route('manage.product').'?search='.$data->category->name}}" class="text-xl text-[#195770] font-bold">{{ $data->category->name }}</a>
            </div>
            <div class="flex flex-col">
                <span class="font-semibold text-gray-500">UMKM</span>
                <a href="{{route('manage.umkm.detail').'/'.$data->umkm->id}}" class="text-xl text-[#195770] font-bold">{{ $data->umkm->name }}</a>
            </div>
            <div class="flex flex-col">
                <span class="font-semibold text-gray-500">Harga</span>
                <span class="text-xl font-bold">Rp {{ number_format($data->price) }}</span>
            </div>
            <div class="flex flex-col">
                <span class="font-semibold text-gray-500">Link Marketplace</span>
                <span class="text-xl font-bold">{{ $data->link ?? "Belum Tersedia" }}</span>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-2 md:gap-5 mt-10 mb-10 pt-10 border-t">
            <img src="{{$data->photo ?? url('images/noimage.jpg')}}" alt="Foto Produk">
            <div class="md:col-span-2 flex flex-col text-justify mt-5 md:mt-0">
                <span class="text-xl font-bold mb-2">Deskripsi Produk</span>
                {{$data->desc}}
            </div>
        </div>
    </div>
</div>
@endsection