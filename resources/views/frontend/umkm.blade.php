@extends('layouts.master')
@section('title', 'UMKM Binaan')
@section('content')
<div class="py-16">
    <div class="max-w-screen-xl mx-8 md:mx-14 2xl:mx-auto">
        <div class="w-full flex justify-center md:justify-start mb-10">
            <a href="{{route('product')}}" class="pb-3 px-3 md:px-5 md:text-xl font-bold border-b-4 border-gray-200">Daftar Produk</a>
            <a href="{{route('umkm-binaan')}}" class="pb-3 px-3 md:px-5 md:text-xl font-bold border-b-4 border-[#195770]">Daftar UMKM</a>
        </div>

        <div class="flex justify-between items-center mb-5">
            <h4 class="text-2xl md:text-5xl font-bold">UMKM Binaan</h4>
            @if ($isFiltered)
            <a href="{{route('umkm-binaan')}}" class="hidden md:flex btn btn-sm md:btn-md btn-error text-white">Clear Filter</a>
            @endif
        </div>

        <form method="get" class="md:mt-5">
            <div class="grid grid-cols-1 md:grid-cols-5 gap-3">
                <input type="text" name="keyword" placeholder="Cari UMKM ..." class="md:col-span-3 input input-bordered w-full" />
                @php
                    $categories = App\Models\ProductCategory::all();
                @endphp
                <select class="select select-bordered w-full" name="category">
                    <option disabled selected>Semua Kategori</option>
                    @foreach ($categories as $item)
                        <option value="{{$item->name}}">{{$item->name}}</option>
                    @endforeach
                    <option value="LAINNYA">LAINNYA</option>
                </select>
                <button class="btn bg-[#195770] text-white hover:bg-[#1ba0db]">Cari</button>
            </div>
        </form>
        @if ($isFiltered)
            <a href="{{route('umkm-binaan')}}" class="md:hidden btn btn-error text-white w-full mt-2">Clear Filter</a>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-4 gap-5 mt-5">
            @if (count($umkm) < 1)
                <span class="text-center md:text-left md:col-span-2">Belum ada UMKM yang dapat ditampilkan</span>
            @endif
            @foreach ($umkm as $d)
            <a target="_blank" href="{{ route('umkm.detail') ."/". $d->id }}" class="bg-white border rounded-md flex flex-col p-2 pb-5">
                <div class="w-full flex items-center justify-center">
                    <img src="{{ $d->logo ?? url('images/noimage.jpg') }}" class="aspect-square">
                </div>

                <span class="mt-3 text-base md:text-xl font-bold text-[#195770]">{{ $d->name }}</span>
                <span class="mt-1 text-base text-gray-500">{{$d->type}}</span>
                {{-- <span class="mt-1 text-sm text-gray-600 font-semibold">{{ $d->products->count() }} Produk</span> --}}
            </a>
            @endforeach
        </div>
    </div>
</div>
@endsection