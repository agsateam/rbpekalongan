@extends('layouts.admin')
@section('title', 'Mitra')
@section('content')

    <div class="relative sm:rounded-lg">

        @if (session('success'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-300" role="alert">
                <span class="font-medium">{{ session('success') }}
            </div>
        @endif

        <div class="flex flex-col md:flex-row justify-between">
            <h4 class="text-2xl md:text-3xl font-bold mb-5">Mitra</h4>
            <div class="breadcrumbs text-sm">
                <ul>
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li>Web Content</li>
                    <li>Mitra</li>
                </ul>
            </div>
        </div>

        <a href="{{ route('webcontent.mitra.create') }}" class="btn bg-[#195770] text-white mb-5">+ Tambah Mitra</a>

        <div class="w-full overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 text-center">
                    <tr>
                        <th scope="col" class="px-16 py-3 text-center">
                            No
                        </th>
                        <th scope="col" class="px-16 py-3">
                            Logo
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama Mitra
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Link
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                @php
                    $no = 1;
                @endphp
                @foreach ($mitra as $m)
                    <tbody class="text-center">
                        <input type="hidden" name="id" value="{{ $m->id }}">
                        <tr class="bg-white border-b  hover:bg-gray-50 ">
                            <td class="px-6 py-4 font-semibold text-gray-900 text-center">
                                {{ $no++ }}
                            </td>
                            <td class="p-4">
                                @if ($m->logo)
                                    <img src="{{ $m->logo }}" class="w-16 md:w-32 max-w-full max-h-full"
                                        alt="logo {{ $m->nama_mitra }}">
                                @else
                                    <p>Belum ada Logo</p>
                                @endif
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900 ">
                                {{ $m->nama_mitra }}
                            </td>
    
                            <td class="px-6 py-4 font-semibold text-gray-900 ">
                                {{ $m->link }}
                            </td>
                            <td class="gap-4 justify-center items-center px-6 py-4">
                                <a href="{{ route('webcontent.mitra.edit') . '/' . $m->id }}"
                                    class="px-6 py-4  font-medium text-green-600  hover:underline">Edit</a>
    
                                <form action="{{ route('webcontent.mitra.delete', $m->id) }}" method="POST"
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
    </div>


@endsection
