@php
use Illuminate\Support\Str;
function testi($testimoni){
    return Str::replace(["\r\n"], ["<br/>"], $testimoni);
}
@endphp

@extends('layouts.admin')
@section('title', 'Testimoni')
@section('content')
<div class="md:px-5">
    <div class="flex flex-col md:flex-row justify-between">
        <h4 class="text-2xl md:text-3xl font-bold mb-5">Testimoni</h4>
        <div class="breadcrumbs text-sm">
            <ul>
                <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li>Testimoni</li>
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
                        {{Str::limit(Str::replace(["\r\n"], [" "], $item->testimoni), 80)}}<br/>
                        <button onclick="loadMore('{{testi($item->testimoni)}}')" class="text-[#195770] cursor-pointer font-bold">Selengkapnya</button>
                    </td>
                    <td class="flex gap-1">
                        <button onclick="confirmDelete('{{ route('manage.testi.delete') . '/' . $item->id }}')" class="btn btn-sm bg-red-600 text-white">
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

    function confirmDelete(href){
        Swal.fire({
            title: 'Konfirmasi',
            text: 'Setelah dihapus data tidak dapat dikembalikan, hapus testimoni ini?',
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