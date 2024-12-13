@php
    function getPagination($data, $type){
        if($type == "prev"){
            return $data->currentPage() == 1 ? $data->currentPage() : $data->currentPage()-1;
        }else{
            return $data->currentPage() == $data->lastPage() ? $data->currentPage() : $data->currentPage()+1;
        }
    }
@endphp

@extends('layouts.admin')
@section('title', 'Detail Statistik')
@section('content')

    <div class="">

        @if (session('success'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-300" role="alert">
                <span class="font-medium">{{ session('success') }}
            </div>
        @endif

        <div class="flex flex-col md:flex-row justify-between">
            <h4 class="text-2xl md:text-3xl font-bold mb-5">Detail Statistik</h4>
            <div class="breadcrumbs text-sm">
                <ul>
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li>Web Content</li>
                    <li>Statistik</li>
                </ul>
            </div>
        </div>

        <a href="{{ route('webcontent.statistik.create') }}" class="btn bg-[#195770] text-white mb-5">+ Tambah Statistik</a>


        <div class="overflow-x-auto border rounded-md">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 text-center">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Tahun
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Jumlah
                        </th>
    
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                @php
                    $no = 1;
                @endphp
    
                @foreach ($data as $d)
                    <tbody class="text-center">
                        <input type="hidden" name="id" value="">
                        <tr class="bg-white border-b  hover:bg-gray-50 ">
                            <td class="p-4">
                                {{ $d->tahun }}
                            </td>
    
    
                            <td class="px-6 py-4 font-semibold text-gray-900 ">
                                {{ $d->jumlah }}
                            </td>
    
                            <td class="flex justify-center items-center px-6">
    
                                <a href="{{ route('webcontent.statistik.edit', $d->id) }}"
                                    class="px-6 py-4  font-medium text-green-600  hover:underline">Edit</a>
    
                                <form action="{{ route('webcontent.statistik.delete', $d->id) }}" method="POST"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus mitra ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="px-6 py-4 font-medium text-red-600 hover:underline">Remove</button>
                                </form>
    
    
                            </td>
                        </tr>
    
                    </tbody>
                @endforeach
            </table>
        </div>
        <div class="flex gap-3 mt-5">
            <a href="{{"?page=" . getPagination($data, 'prev')}}" class="bg-[#195770] rounded-md text-white px-3 py-1"><</a>
            <a href="{{"?page=" . getPagination($data, 'next')}}" class="bg-[#195770] rounded-md text-white px-3 py-1">></a>
        </div>



    </div>


@endsection
