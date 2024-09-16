@php
function sliceText($text){
    if(strlen($text) > 150) $text = substr($text, 0, 150).'...';
    return $text;
}

function toDate($date){
    return Carbon\Carbon::createFromDate($date)->format('d M Y');
}
@endphp

@extends('layouts.master')
@section('title', 'Event')
@section('content')


<div class="py-16">
    <div class="max-w-screen-xl mx-8 md:mx-14 2xl:mx-auto">
        <h4 class="text-xl md:text-5xl font-bold mb-5">Event</h4>

        <form method="get">
        <div class="grid grid-cols-6 gap-3">
            <input type="text" name="keyword" placeholder="Kata kunci ..." class="col-span-3 input input-bordered w-full" />
            <select class="select select-bordered w-full" name="type">
                <option selected>Semua event</option>
                <option>Akan datang</option>
                <option>Selesai</option>
            </select>
            <input
                name="date"
                placeholder="Tanggal"
                class="input input-bordered w-full"
                type="text"
                onfocus="(this.type='date')"
                onblur="(this.type='text')"
            />
            <button class="btn bg-[#195770] text-white hover:bg-[#1ba0db]">Cari</button>
        </div>
        </form>

        <div class="grid grid-cols-1 gap-5 mt-10">
            @foreach ($events as $item)
            <div class="border rounded-md flex p-5">
                <img src="{{ $item['poster'] }}" class="w-56 rounded-md">
                <div class="flex flex-col ml-10">
                    <span class="text-3xl">{{ $item['name'] }}</span>
                    <span class="mt-2">{{ $item['deskripsi'] }}</span>
                    <span class="font-semibold mt-3 flex">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        {{ toDate($item['date']) }} | {{ $item['time'] }}
                    </span>
                    <span class="font-semibold flex mt-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                        </svg>                                      
                        {{ $item['location'] }}
                    </span>

                    @if ($item['status'] == "upcoming")
                        <div class="mt-5">
                            <button class="btn btn-sm bg-[#195770] text-white">Daftar Event</button>
                        </div>
                    @else
                        <div class="mt-5">
                            <span class="rounded-md px-3 py-1 bg-emerald-700 text-white">Event Telah Selesai</span>
                            <span class="rounded-md px-3 py-1 bg-gray-200 ml-3">20 Peserta Mengikuti</span>
                        </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
