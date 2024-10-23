@extends('layouts.master')
@section('title', 'Booking Success')
@section('content')

<div class="py-16">
    <div class="max-w-screen-xl mx-8 md:mx-14 2xl:mx-auto">
        <div class="flex flex-row justify-between items-center">
            <h4 class="text-3xl md:text-4xl font-bold mb-5">Booking Ruangan</h4>
            <a href="/" class="btn btn-sm bg-[#195770] text-white">Kembali</a>
        </div>

        <div class="bg-white border rounded-md p-10">
            <div class="flex flex-col items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-emerald-500 size-40">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                </svg>                 
                <span class="text-2xl md:text-4xl font-bold mt-3">Booking Berhasil</span> 
                <p class="mt-3 text-xl text-center max-w-lg">Silahkan datang sesuai waktu yang dipilih.</p>
                <table class="mt-5 text-sm md:text-base">
                    <tr>
                        <td>Ruangan</td>
                        <td class="px-2">:</td>
                        <td>{{$room}}</td>
                    </tr>
                    <tr>
                        <td>Waktu</td>
                        <td class="px-2">:</td>
                        <td>{{$time}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection