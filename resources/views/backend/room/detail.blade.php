@php
$no = 1;
@endphp

@extends('layouts.admin')
@section('title', 'Detail Ruang')

@section('content')
<div class="md:px-5">
    <div class="flex flex-col md:flex-row justify-between">
        <h4 class="text-2xl md:text-3xl font-bold mb-5">Detail Ruang</h4>
        <div class="breadcrumbs text-sm">
            <ul>
                <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li>Booking</li>
                <li>Ruang</li>
                <li>Detail</li>
            </ul>
        </div>
    </div>

    @include('components.backend.alert')

    <div class="flex justify-end">
        <a href="{{route('manage.room')}}" class="px-4 py-1 bg-gray-500 text-white rounded-md mt-3">Kembali</a>
    </div>
    <div class="flex flex-col border rounded-md p-5 mt-2">
        <div class="grid grid-cols-1 md:grid-cols-5 gap-3">
            <div class="flex flex-col md:col-span-2">
                <span class="text-base text-gray-600">Ruangan</span>
                <span class="text-xl font-bold">{{$data->name}}</span>
            </div>
            <div class="flex flex-col">
                <span class="text-base text-gray-600">Jumlah Kursi</span>
                <span class="text-xl font-bold">{{$data->seat}}</span>
            </div>
            <div class="flex flex-col">
                <span class="text-base text-gray-600">Full Booking</span>
                <span class="text-xl font-bold">{{$data->isMustFullBooking ? "Ya" : "Tidak"}}</span>
            </div>
            <div class="flex flex-col">
                <span class="text-base text-gray-600">Open to Booking</span>
                <div class="flex items-center">
                    <span class="text-xl font-bold {{$data->open_booking ? "text-emerald-700" : "text-red-700"}}">{{$data->open_booking ? "Dibuka" : "Ditutup"}}</span>
                    <button
                        class="ml-2 {{$data->open_booking ? 'bg-red-700' : 'bg-emerald-600'}} text-white text-xs font-semibold px-3 py-1 rounded-md"
                        onclick="openBooking('{{$data->open_booking ? 'close' : 'open'}}', '{{$data->id}}')"
                    >
                        {{$data->open_booking ? "Tutup" : "Buka"}}
                    </button>
                </div>
            </div>
        </div>

        <div class="mt-5 pt-5 border-t">
            <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-3">
                <div class="flex text-lg font-bold mb-2 md:mb-0">Waktu Booking <span class="hidden md:block ml-1">{{$data->name}}</span></div>
                <button class="px-4 py-1 bg-[#195770] text-white rounded-md" onclick="modalWaktu.showModal()">+ Tambah Waktu</button>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full table table-auto border border-gray-200 rounded-md">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="py-3 text-left font-medium uppercase">No</th>
                            <th class="py-3 text-left font-medium uppercase">Mulai</th>
                            <th class="py-3 text-left font-medium uppercase">Selesai</th>
                            <th class="py-3 text-left font-medium uppercase">Dibooking</th>
                            <th class="py-3 text-left font-medium uppercase">Tersedia</th>
                            <th class="py-3 text-left font-medium uppercase">#</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @if ($data->times()->count() < 1)
                        <tr>
                            <td colspan="4" class="text-center">Data kesediaan waktu belum tersedia</td>
                        </tr>
                        @endif
                        @foreach ($data->times as $item)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$item->open}}</td>
                            <td>{{$item->close}}</td>
                            <td class="font-bold">{{$item->booked}}</td>
                            <td class="font-bold">{{$data->seat - $item->booked}}</td>
                            <td class="flex gap-1">
                                <button onclick="edit('{{$item->id }}','{{$item->open }}','{{$item->close }}')" class="btn btn-sm bg-[#195770] text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5">
                                        <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                                        <path d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                                    </svg>
                                </button>
                                <button onclick="confirmDelete('{{ route('manage.room.time.delete') . '/' . $item->id }}')" class="btn btn-sm bg-red-600 text-white">
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
    </div>
</div>
@endsection

@section('script')
<dialog id="modal_waktu" class="modal modal-middle">
    <div class="modal-box pb-8">
        <div class="w-full flex justify-between items-center border-b pb-3 mb-3 sticky top-0">
            <h3 class="text-lg font-bold">Tambah Waktu Booking</h3>
            <button type="button" onclick="modalWaktu.close()" class="btn btn-sm bg-gray-500 text-white">Tutup</button>
        </div>
        <form class="w-full" action="{{route('manage.room.time.save')}}" method="post">
            @csrf
            <input type="hidden" name="booking_room_id" value="{{$data->id}}">
            <div class="flex justify-between gap-3">
                <label class="form-control w-full mb-3">
                    <div class="label">
                        <span class="label-text text-base font-semibold">Mulai <span class="text-red-600 font-bold">*</span></span>
                    </div>
                    <div class="relative">
                        <div class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <input type="time" class="input input-bordered text-gray-900 text-sm rounded-lg block w-full p-2.5" value="00:00" name="open" required/>
                    </div>
                </label>
                <label class="form-control w-full mb-3">
                    <div class="label">
                        <span class="label-text text-base font-semibold">Selesai <span class="text-red-600 font-bold">*</span></span>
                    </div>
                    <div class="relative">
                        <div class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <input type="time" class="input input-bordered text-gray-900 text-sm rounded-lg block w-full p-2.5" value="00:00" name="close" required/>
                    </div>
                </label>
            </div>
            <button type="submit" class="btn bg-[#195770] text-white w-full">Simpan</button>
        </form>
    </div>
</dialog>

<dialog id="modal_waktu_edit" class="modal modal-middle">
    <div class="modal-box pb-8">
        <div class="w-full flex justify-between items-center border-b pb-3 mb-3 sticky top-0">
            <h3 class="text-lg font-bold">Edit Waktu Booking</h3>
            <button type="button" onclick="modalWaktuEdit.close()" class="btn btn-sm bg-gray-500 text-white">Tutup</button>
        </div>
        <form class="w-full" action="{{route('manage.room.time.update')}}" method="post">
            @csrf
            <input type="hidden" name="id" id="edit_id">
            <div class="flex justify-between gap-3">
                <label class="form-control w-full mb-3">
                    <div class="label">
                        <span class="label-text text-base font-semibold">Mulai <span class="text-red-600 font-bold">*</span></span>
                    </div>
                    <div class="relative">
                        <div class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <input type="time" class="input input-bordered text-gray-900 text-sm rounded-lg block w-full p-2.5" id="edit_open" name="open" required/>
                    </div>
                </label>
                <label class="form-control w-full mb-3">
                    <div class="label">
                        <span class="label-text text-base font-semibold">Selesai <span class="text-red-600 font-bold">*</span></span>
                    </div>
                    <div class="relative">
                        <div class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <input type="time" class="input input-bordered text-gray-900 text-sm rounded-lg block w-full p-2.5" id="edit_close" name="close" required/>
                    </div>
                </label>
            </div>
            <button type="submit" class="btn bg-[#195770] text-white w-full">Simpan</button>
        </form>
    </div>
</dialog>

<script>
    const modalWaktu = document.getElementById('modal_waktu');
    const modalWaktuEdit = document.getElementById('modal_waktu_edit');

    function confirmDelete(href){
        Swal.fire({
            title: 'Konfirmasi',
            text: 'Tindakan ini tidak dapat dibatalkan, hapus waktu booking ini? ',
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

    function edit(id, open, close){
        document.querySelector('#edit_id').setAttribute("value", id);
        document.querySelector('#edit_open').setAttribute("value", open);
        document.querySelector('#edit_close').setAttribute("value", close);

        modalWaktuEdit.showModal();
    }

    function openBooking(status, id){
        const route = "{{route('manage.room.status')}}";

        Swal.fire({
            title: 'Konfirmasi',
            text: (status == 'open' ? 'Buka' : 'Tutup') + ' booking ruangan ini?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: "#195770",
            cancelButtonText: 'Batal',
            confirmButtonText: 'Ya',
        }).then((val) => {
            val['isConfirmed'] && (window.location.href = route +"/"+ id +"/"+ status)
        })
    }
</script>
@endsection