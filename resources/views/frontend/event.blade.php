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
@section('title', $title)

@section('head')
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@endsection

@section('content')
<div class="py-16">
    <div class="max-w-screen-xl mx-8 md:mx-14 2xl:mx-auto">
        <div class="flex justify-between items-center mb-5">
            <h4 class="text-4xl md:text-5xl font-bold">{{$title}}</h4>
            @if ($isFiltered)
            <a href="{{route('event')}}" class="btn btn-sm md:btn-md btn-error text-white">Clear Filter</a>
            @endif
        </div>

        <form method="get">
        <div class="grid grid-cols-1 md:grid-cols-5 gap-3">
            <input type="text" name="keyword" placeholder="Cari event ..." value="{{$req['keyword'] ?? ""}}" class="md:col-span-2 input input-bordered w-full" />
            <select class="select select-bordered w-full" name="type">
                <option value="all" {{ $type == "all" ? 'selected' : '' }}>Semua event</option>
                <option value="upcoming" {{ $type == "upcoming" ? 'selected' : '' }}>Akan datang</option>
                <option value="done" {{ $type == "done" ? 'selected' : '' }}>Selesai</option>
            </select>
            <input type="text" name="date" placeholder="Tanggal" value="{{$req['date'] ?? ""}}" class="input input-bordered w-full" autocomplete="off" readonly/>
            <button class="btn bg-[#195770] text-white hover:bg-[#1ba0db]">Cari</button>
        </div>
        </form>

        <div class="grid grid-cols-1 gap-5 mt-10">
            @if (count($events) < 1)
                <span class="text-center md:text-left">Tidak ada event yang tersedia</span>
            @endif
            @foreach ($events as $item)
            <div class="bg-white border rounded-md flex flex-col md:flex-row p-5">
                <img src="{{ $item['poster'] }}" class="w-full aspect-square object-cover md:w-56 rounded-md">
                <div class="flex flex-col md:ml-10 mt-3 md:mt-0">
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
                            <a href="{{ route('event.regist') . '/' . $item->id }}" class="btn btn-sm bg-[#195770] text-white">Daftar Event</a>
                        </div>
                    @else
                        <div class="flex flex-col md:flex-row mt-5">
                            <span class="rounded-md px-3 py-1 bg-emerald-700 text-white">Event Telah Selesai</span>
                            <span class="rounded-md px-3 py-1 bg-gray-200 md:ml-3 mt-2 md:mt-0">{{$item->participant}} Peserta Mengikuti</span>
                        </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
    $(function() {
    
      $('input[name="date"]').daterangepicker({
          autoUpdateInput: false,
          locale: {
              cancelLabel: 'Clear'
          }
      });
    
      $('input[name="date"]').on('apply.daterangepicker', function(ev, picker) {
          $(this).val(picker.startDate.format('YYYY/MM/DD') + '-' + picker.endDate.format('YYYY/MM/DD'));
      });
    
      $('input[name="date"]').on('cancel.daterangepicker', function(ev, picker) {
          $(this).val('');
      });
    
    });
    </script>
@endsection