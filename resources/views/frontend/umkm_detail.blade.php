@extends('layouts.master')
@section('title', $data->name)
@section('content')
<div class="py-16">
    <div class="max-w-screen-xl mx-8 md:mx-14 2xl:mx-auto">
        <div class="breadcrumbs text-sm md:text-xl mb-8">
            <ul>
                <li>Beranda</li>
                <li><a href="{{route('umkm-binaan')}}">UMKM</a></li>
                <li>Detail</li>
            </ul>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 mb-5 gap-10">
            <img src="{{$data->logo ?? url('images/noimage.jpg')}}" class="rounded-md">
            <div class="flex flex-col md:col-span-2">
                <div class="flex flex-col">
                    <span>Nama Usaha</span>
                    <span class="text-lg md:text-xl font-semibold">{{$data->name}}</span>
                </div>
                <div class="flex flex-col mt-3">
                    <span>Nama Pemilik</span>
                    <span class="text-lg md:text-xl font-semibold">{{$data->owner}}</span>
                </div>
                <div class="flex flex-col mt-3">
                    <span>Kategori Usaha</span>
                    <span class="text-lg md:text-xl font-semibold">{{$data->type}}</span>
                </div>
                {{-- <div class="flex flex-col mt-3">
                    <span>Jumlah Produk</span>
                    <span class="text-lg md:text-xl font-semibold">{{$productCount}}</span>
                </div> --}}
                <div class="flex items-center mt-5">
                    <img src="https://img.icons8.com/?size=100&id=16713&format=png&color=000000" class="size-7">
                    <span class="font-bold ml-3">
                        {{$data->phone}}
                    </span>
                </div>
                <div class="flex items-center mt-2">
                    <img src="https://img.icons8.com/?size=100&id=nj0Uj45LGUYh&format=png&color=000000" class="size-7">
                    <span class="font-bold ml-3">
                        {!!
                            $data->instagram
                            ? "<a class='text-[#195770]' href='http://instagram.com/".$data->instagram."' target='_blank'>@$data->instagram</a>"
                            : "-"
                        !!}
                    </span>
                </div>
                <div class="flex items-center mt-2">
                    <img src="https://img.icons8.com/?size=100&id=13912&format=png&color=000000" class="size-7">
                    <span class="font-bold ml-3">
                        {{$data->facebook ?? "-"}}
                    </span>
                </div>
                <div class="flex items-center mt-2">
                    <img src="https://img.icons8.com/?size=100&id=r5oDueTsU4cn&format=png&color=000000" class="size-7">
                    <span class="font-bold ml-3 text-[#195770]">
                        <a href="{{$data->marketplace_link}}">{{$data->marketplace}}</a>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <div class="bg-gray-100 py-10">
    <div class="max-w-screen-xl mx-8 md:mx-14 2xl:mx-auto">
        <h4 class="text-lg md:text-2xl font-bold mb-5 ml-2">Produk dari {{$data->name}}</h4>
        @if($productCount < 1)
            <span class="ml-2">Belum ada produk yang dapat ditampilkan.</span>
        @endif
        <div class="grid grid-cols-2 md:grid-cols-4 gap-2 md:gap-8">
            @foreach ($products as $data)
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
</div> --}}
@endsection