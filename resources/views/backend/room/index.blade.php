@php
$no = 1;    
@endphp

@extends('layouts.admin')
@section('title', 'Kelola Ruangan')

@section('content')
<div class="md:px-5">
    <div class="flex flex-col md:flex-row justify-between">
        <h4 class="text-2xl md:text-3xl font-bold mb-5">Ruangan</h4>
        <div class="breadcrumbs text-sm">
            <ul>
                <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li>Booking</li>
                <li>Ruangan</li>
            </ul>
        </div>
    </div>

    <div class="my-5">
        @include('components.backend.alert')
    </div>

    <a href="{{route('manage.room.add')}}" class="w-fit px-4 py-2 bg-[#195770] text-white rounded-md">+ Tambah Data Ruangan</a>
    <div class="overflow-x-auto mt-4">
        <table class="w-full text-base table table-auto border border-gray-300 mb-10">
            <thead class="bg-gray-100 text-sm uppercase">
                <tr>
                    <th class="py-3 text-left border border-gray-300" rowspan="2">No</th>
                    <th class="py-3 text-left border border-gray-300 min-w-44" rowspan="2">Ruang</th>
                    <th class="py-3 text-left border border-gray-300" rowspan="2">Jumlah Kursi</th>
                    <th class="py-3 text-center border border-gray-300" colspan="3">Waktu Booking</th>
                    <th class="py-3 text-center border border-gray-300" rowspan="2">Aksi</th>
                </tr>
                <tr>
                    <th class="py-3 text-left border border-gray-300 min-w-28">Waktu</th>
                    <th class="py-3 text-center border border-gray-300">Dibooking</th>
                    <th class="py-3 text-center border border-gray-300">Tersedia</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @if (count($data) < 1)
                <tr>
                    <td colspan="5">Belum ada data</td>
                </tr>
                @endif
                @foreach ($data as $item)
                <tr>
                    <td class="border">{{$no++}}</td>
                    <td class="border">{{$item->name}}</td>
                    <td class="border">{{$item->seat}}</td>
                    @if ($item->times()->count() < 1)
                        <td class="border text-center" colspan="3">
                            <span class="text-red-600">Waktu Belum Diatur</span>
                        </td>
                    @else
                        <td class="p-0 border">
                            @foreach ($item->times()->get() as $time)
                                <div class="py-2 px-3 border-t first:border-t-0">
                                    {{$time->open ." - ". $time->close}}
                                </div>
                            @endforeach
                        </td>
                        <td class="p-0 border text-center font-bold">
                            @foreach ($item->times()->get() as $time)
                                <div class="py-2 px-3 border-t first:border-t-0">
                                    {{$time->booked}} <br/>
                                </div>
                            @endforeach
                        </td>
                        <td class="p-0 border text-center font-bold">
                            @foreach ($item->times()->get() as $time)
                                <div class="py-2 px-3 border-t first:border-t-0">
                                    {{$item->seat - $time->booked}} <br/>
                                </div>
                            @endforeach
                        </td>
                    @endif
                    <td class="flex gap-1 justify-center">
                        <a href="{{route('manage.room.detail') .'/'. $item->id}}" class="btn btn-sm bg-emerald-600 text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                        </a>
                        <a href="{{route('manage.room.edit') .'/'. $item->id}}" class="btn btn-sm bg-[#195770] text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5">
                                <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                                <path d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                            </svg>
                        </a>
                        <button onclick="confirmDelete('{{ route('manage.room.delete') . '/' . $item->id }}')" class="btn btn-sm bg-red-600 text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5">
                                <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('script')
    <script>
        function confirmDelete(href){
            Swal.fire({
                title: 'Konfirmasi',
                text: 'Tindakan ini tidak dapat dibatalkan, hapus data ruangan? ',
                icon: 'question',
                iconColor: 'red',
                showCancelButton: true,
                confirmButtonColor: "red",
                cancelButtonText: 'Batal',
                confirmButtonText: 'Ya',
            }).then((val) => {
                val['isConfirmed'] && (window.location.href = href)
            })
        }
    </script>
@endsection