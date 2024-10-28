@extends('layouts.admin')
@section('title', 'Buka/Tutup Booking')

@section('content')

<div class="md:px-5">
    <div class="flex flex-col md:flex-row justify-between">
        <h4 class="text-2xl md:text-3xl font-bold mb-5">Buka/Tutup Booking</h4>
        <div class="breadcrumbs text-sm">
            <ul>
                <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li>Booking</li>
                <li>Buka/Tutup</li>
            </ul>
        </div>
    </div>

    <div class="grid grid-cols-2 gap-5 mt-10">
        <div class="flex flex-col justify-center items-center p-10 rounded-lg border bg-gray-100">
            <span class="text-2xl">Status booking saat ini :</span>
            <span class="text-3xl {{$open ? 'bg-emerald-600' : 'bg-red-600'}} text-white w-fit px-5 py-1 rounded-lg mt-5">
                {{$open ? "Dibuka" : "Ditutup"}}
            </span>
        </div>
        <a href="{{route('manage.booking.open.update') ."/". ($open ? 'close' : 'open')}}" class="flex flex-col justify-center items-center p-10 rounded-lg border {{$open ? 'bg-red-700' : 'bg-emerald-600'}} text-white">
            @if ($open)
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-16 mb-5">
                    <path fill-rule="evenodd" d="M12 1.5a5.25 5.25 0 0 0-5.25 5.25v3a3 3 0 0 0-3 3v6.75a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3v-6.75a3 3 0 0 0-3-3v-3c0-2.9-2.35-5.25-5.25-5.25Zm3.75 8.25v-3a3.75 3.75 0 1 0-7.5 0v3h7.5Z" clip-rule="evenodd" />
                </svg>
            @else
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-16 mb-5">
                    <path d="M18 1.5c2.9 0 5.25 2.35 5.25 5.25v3.75a.75.75 0 0 1-1.5 0V6.75a3.75 3.75 0 1 0-7.5 0v3a3 3 0 0 1 3 3v6.75a3 3 0 0 1-3 3H3.75a3 3 0 0 1-3-3v-6.75a3 3 0 0 1 3-3h9v-3c0-2.9 2.35-5.25 5.25-5.25Z" />
                </svg>
            @endif
            <span class="text-2xl">Klik untuk {{$open ? 'tutup' : 'buka'}} booking</span>
        </a>
    </div>
</div>

@endsection
