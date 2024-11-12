@php
use Illuminate\Support\Str;
function testi($testimoni){
    return Str::replace(["\r\n"], ["<br/>"], $testimoni);
}
@endphp

@extends('layouts.admin')
@section('title', 'Verifikasi Testimoni')
@section('content')
<div class="md:px-5">
    <div class="flex flex-col md:flex-row justify-between">
        <h4 class="text-2xl md:text-3xl font-bold mb-5">Verifikasi Testimoni</h4>
        <div class="breadcrumbs text-sm">
            <ul>
                <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li>Testimoni</li>
                <li>Verifikasi</li>
            </ul>
        </div>
    </div>

    <div class="mt-10 mb-5">
        @include('components.backend.alert')
    </div>

    <div class="overflow-x-auto">
        <table class="w-full table table-auto border border-gray-200 rounded-md ">
            <thead class="bg-gray-100">
                <tr>
                    <th class="py-3 text-left font-medium uppercase">Nama</th>
                    <th class="py-3 text-left font-medium uppercase">Gender</th>
                    <th class="py-3 text-left font-medium uppercase">UMKM</th>
                    <th class="py-3 text-left font-medium uppercase">Pesan</th>
                    <th class="py-3 text-left font-medium uppercase">#</th>
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
                    <td>{{$item->name}}</td>
                    <td>{{$item->gender == "lk" ? "Laki-laki" : "Perempuan"}}</td>
                    <td>{{$item->umkm}}</td>
                    <td>
                        {{Str::limit(Str::replace(["\r\n"], [" "], $item->testimoni), 50)}}<br/>
                        <button onclick="loadMore('{{testi($item->testimoni)}}')" class="text-[#195770] cursor-pointer font-bold">Selengkapnya</button>
                    </td>
                    <td class="flex gap-1">
                        <button onclick="confirmAccept('{{ route('manage.testi.accept') . '/' . $item->id }}')" class="btn btn-sm bg-emerald-600 text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                        </button>
                        <button onclick="confirmReject('{{ route('manage.testi.reject') . '/' . $item->id }}')" class="btn btn-sm bg-red-600 text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
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
<dialog id="modal_more" class="modal modal-bottom sm:modal-middle">
    <div class="modal-box pb-16 md:pb-8">
        <div class="w-full flex flex-col">
            <p id="testi"></p>
            <button type="button" onclick="modalMore.close()" class="btn btn-sm bg-gray-500 text-white mt-5">Tutup</button>
        </div>
    </div>
</dialog>

<script>

const modalMore = document.getElementById('modal_more');
    function loadMore(testi){
        console.log(testi);
        
        modalMore.showModal();
        document.getElementById('testi').innerHTML = testi;
    }

    function confirmReject(href){
        Swal.fire({
            title: 'Konfirmasi',
            text: 'Tolak testimoni ini?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: "#195770",
            cancelButtonText: 'Batal',
            confirmButtonText: 'Ya',
        }).then((val) => {
            val['isConfirmed'] && (window.location.href = href)
        })
    }

    function confirmAccept(href){
        Swal.fire({
            title: 'Konfirmasi',
            text: 'Terima testimoni ini?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: "#195770",
            cancelButtonText: 'Batal',
            confirmButtonText: 'Ya',
        }).then((val) => {
            val['isConfirmed'] && (window.location.href = href)
        })
    }
</script>
@endsection