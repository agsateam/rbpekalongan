@extends('layouts.master')
@section('title', $data->name)
@section('content')
<div class="py-16">
    <div class="max-w-screen-xl mx-8 md:mx-14 2xl:mx-auto">
        <div class="breadcrumbs text-sm md:text-xl mb-8">
            <ul>
                <li>Beranda</li>
                <li>Produk</li>
                <li>Detail Produk</li>
            </ul>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 mb-5 gap-10">
            <img src="{{$data->photo}}" class="rounded-md">
            <div class="flex flex-col md:col-span-2">
                <span class="text-lg md:text-xl font-semibold">{{$data->umkm->name}}</span>
                <span class="text-2xl md:text-4xl text-[#195770] font-bold md:mt-5">{{$data->name}}</span>
                <span class="text-xl md:text-2xl font-bold md:mt-2">Rp {{number_format($data->price)}}</span>

                <div class="flex items-center mt-5">
                    <img src="https://img.icons8.com/?size=100&id=16713&format=png&color=000000" class="size-7">
                    <span class="font-bold ml-3">
                        {{$data->umkm->phone}}
                    </span>
                </div>
                <div class="flex items-center mt-2">
                    <img src="https://img.icons8.com/?size=100&id=nj0Uj45LGUYh&format=png&color=000000" class="size-7">
                    <span class="font-bold ml-3">
                        {{$data->umkm->instagram ?? "-"}}
                    </span>
                </div>
                <div class="flex items-center mt-2">
                    <img src="https://img.icons8.com/?size=100&id=13912&format=png&color=000000" class="size-7">
                    <span class="font-bold ml-3">
                        {{$data->umkm->facebook ?? "-"}}
                    </span>
                </div>
                <div class="flex items-center mt-2">
                    <img src="https://img.icons8.com/?size=100&id=r5oDueTsU4cn&format=png&color=000000" class="size-7">
                    <span class="font-bold ml-3">
                        <a href="{{$data->umkm->marketplace_link}}">{{$data->umkm->marketplace}}</a>
                        @if($data->link != null)
                            <span class="px-2">-</span>
                            <a href="{{$data->link}}" class="text-[#195770]">{{$data->link}}</a>
                        @endif
                    </span>
                </div>
            </div>
        </div>
        <div class="w-full flex flex-col pt-5">
            <span class="font-bold text-xl">Deskripsi Produk</span>
            {{$data->desc}}
        </div>
    </div>
</div>
<div class="bg-gray-100 py-10">
    <div class="max-w-screen-xl mx-8 md:mx-14 2xl:mx-auto">
        <h4 class="text-lg md:text-2xl font-bold mb-5 ml-2">Produk lain dari {{$data->umkm->name}}</h4>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-2 md:gap-8">
            @foreach ($otherProducts as $data)
            <div class="w-full flex flex-col p-2 bg-white pb-5">
                <img src="{{ $data->photo ?? url('images/noimage.jpg') }}" class="w-full">

                <a href="{{ route('product.detail') ."/". $data->id }}" class="mt-3 text-base md:text-xl font-bold text-[#195770]">
                    {{ $data->name }}
                </a>
                <span class="mt-1 text-base text-gray-500">Rp {{ number_format($data->price) }}</span>
                <span class="mt-1 text-sm text-gray-600 font-semibold">{{ $data->umkm->name }}</span>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection