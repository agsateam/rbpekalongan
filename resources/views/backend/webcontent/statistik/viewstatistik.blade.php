@extends('layouts.admin')
@section('title', 'Mitra')
@section('content')

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

        @if (session('success'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-300" role="alert">
                <span class="font-medium">{{ session('success') }}
            </div>
        @endif

        <div class="flex flex-col md:flex-row justify-between">
            <h4 class="text-2xl md:text-3xl font-bold mb-5">Statistik</h4>
            <div class="breadcrumbs text-sm">
                <ul>
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li>Web Content</li>
                    <li>Statistik</li>
                </ul>
            </div>
        </div>

        {{-- <a href="{{ route('webcontent.mitra.create') }}" class="btn bg-[#195770] text-white mb-5">+ Tambah Mitra</a> --}}


        <div class="flex flex-wrap justify-center items-center p-4 gap-4">
            @foreach ($statistik as $s)
                <div
                    class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex justify-end px-4 pt-4">
                    </div>
                    <div class="flex flex-col items-center pb-10">
                        <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="/docs/images/people/profile-picture-3.jpg"
                            alt="Bonnie image" />
                        <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{ $s->jumlah }}</h5>
                        <span class="text-sm text-gray-500 dark:text-gray-400">{{ $s->jenis_statistik }}</span>
                        <div class="flex mt-4 md:mt-6">
                            <a href="{{ route('webcontent.statistik.edit') . '/' . $s->id }}"
                                class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 ">Edit
                                Statistik</a>

                        </div>
                    </div>
                </div>
            @endforeach


        </div>



    </div>


@endsection
