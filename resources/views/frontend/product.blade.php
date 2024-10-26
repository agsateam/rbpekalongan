@extends('layouts.master')
@section('title', 'Produk UMKM Binaan')
@section('content')
<div class="py-16">
    <div class="max-w-screen-xl mx-8 md:mx-14 2xl:mx-auto">
        <div class="w-full flex justify-center md:justify-start mb-10">
            <a href="{{route('product')}}" class="pb-3 px-3 md:px-5 md:text-xl font-bold border-b-4 border-[#195770]">Daftar Produk</a>
            <a href="{{route('umkm-binaan')}}" class="pb-3 px-3 md:px-5 md:text-xl font-bold border-b-4 border-gray-200">Daftar UMKM</a>
        </div>

        <div class="flex justify-between items-center mb-5">
            <h4 class="text-2xl md:text-5xl font-bold">Produk UMKM Binaan</h4>
            @if ($isFiltered)
            <a href="{{route('product')}}" class="hidden md:flex btn btn-sm md:btn-md btn-error text-white">Clear Filter</a>
            @endif
        </div>

        <form method="get" class="md:mt-5">
            <div class="grid grid-cols-2 md:grid-cols-6 gap-3">
                <input type="text" name="keyword" placeholder="Cari Produk ..." class="col-span-2 md:col-span-3 input input-bordered w-full" />
                <select class="select select-bordered w-full" name="category">
                    <option disabled selected>Semua Kategori</option>
                    @foreach ($categories as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
                <select class="select select-bordered w-full" name="price">
                    <option disabled selected>Urutkan Harga</option>
                    <option value="asc">Terendah</option>
                    <option value="desc">Tertinggi</option>
                </select>
                <button class="col-span-2 md:col-span-1 btn bg-[#195770] text-white hover:bg-[#1ba0db]">Cari</button>
            </div>
        </form>
        @if ($isFiltered)
            <a href="{{route('product')}}" class="md:hidden btn btn-error text-white w-full mt-2">Clear Filter</a>
        @endif

        <div class="grid grid-cols-2 md:grid-cols-4 gap-5 mt-5">
            @if (count($products) < 1)
                <span class="text-center md:text-left col-span-2">Belum ada produk yang tersedia</span>
            @endif
            @foreach ($products as $p)
            <a target="_blank" href="{{ route('product.detail') ."/". $p->id }}" class="bg-white border rounded-md flex flex-col p-2 pb-5">
                <img src="{{ $p->photo ?? url('images/noimage.jpg') }}" class="w-full">

                <span class="mt-3 text-base md:text-xl font-bold text-[#195770]">{{ $p->name }}</span>
                <span class="mt-1 text-base text-gray-500">Rp {{ number_format($p->price) }}</span>
                <span class="mt-1 text-sm text-gray-600 font-semibold">{{ $p->umkm->name }}</span>
            </a>
            @endforeach
        </div>
    </div>
</div>
@endsection