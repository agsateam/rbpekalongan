@php
$no = 1;
$certno = 1;
@endphp

@extends('layouts.admin')
@section('title', 'Fasilitator')
@section('content')
<div class="md:px-5">
    <div class="flex flex-col md:flex-row justify-between">
        <h4 class="text-2xl md:text-3xl font-bold mb-5">Fasilitator</h4>
        <div class="breadcrumbs text-sm">
            <ul>
                <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li>Fasilitator</li>
            </ul>
        </div>
    </div>

    <div class="mt-10 mb-5">
        @include('components.backend.alert')
    </div>

    <a href="{{route('manage.fasilitator.add')}}" class="btn bg-[#195770] text-white mb-5">+ Tambah Fasilitator</a>
    <table id="umkm-table"  class="w-full table table-auto border border-gray-200 rounded-md ">
        <thead class="bg-gray-100">
            <tr>
                <th class="py-3 text-left font-medium uppercase">No</th>
                <th class="py-3 text-left font-medium uppercase">Fasilitator</th>
                <th class="py-3 text-left font-medium uppercase">UMKM Binaan</th>
                <th class="py-3 text-left font-medium uppercase">Sertifikasi</th>
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
                <td>{{$no++}}</td>
                <td>{{$item->name}}</td>
                <td>
                    <div class="flex flex-col">
                        {{$item->umkm()->where('status', 'join')->count()}}
                        @if($item->umkm()->where('status', 'join')->count() > 0)
                            <a class="w-fit btn btn-xs bg-[#195770] text-white mt-1" href="{{route('manage.umkm') . "?search=" . $item->name}}">Lihat Daftar</a>
                        @endif
                    </div>
                </td>
                <td>
                    @foreach (explode(",", $item->certification) as $cert)
                        {{ $certno++ . ". " . $cert}} <br/>
                    @endforeach
                    @php $certno = 1 @endphp
                </td>
                <td class="flex gap-1">
                    <a href="{{route('manage.fasilitator.edit') . "/" . $item->id}}" class="btn btn-sm bg-[#195770] text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                        </svg>          
                    </a>
                    <button onclick="confirmDelete('{{ route('manage.fasilitator.delete') . '/' . $item->id }}')" class="btn btn-sm bg-red-600 text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                        </svg>                 
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('script')
<script>
    function confirmDelete(href){
        Swal.fire({
            title: 'Konfirmasi',
            text: 'Yakin akan menghapus data fasilitator ini?',
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