@extends('layouts.admin')
@section('title', 'Edit Statistik')
@section('content')

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">


        <div class="flex flex-col md:flex-row justify-between">
            <h4 class="text-2xl md:text-3xl font-bold mb-5">Edit Statistik {{ $statistik->jenis_statistik }}</h4>
            <div class="breadcrumbs text-sm">
                <ul>
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li>Web Content</li>
                    <li>Statistik</li>
                </ul>
            </div>
        </div>

        <div class="">

            <form class="p-4 md:p-5" action="{{ route('webcontent.statistik.update') . '/' . $statistik->id }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="flex items-center  w-full mb-4 gap-4">


                </div>

                <div class="grid gap-4 mb-4 grid-cols-2">


                    <div class="mb-5">
                        <label for="jumlah"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Statistik</label>
                        <input type="number" id="jumlah"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                            value="{{ old('jumlah', $statistik->jumlah) }}" name="jumlah" required />
                    </div>
                </div>

                <div class="flex justify-start mt-6 gap-2">
                    <button type="submit"
                        class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Update
                    </button>

                    <a href="{{ route('webcontent.statistik.getdata', $statistik->jenis_statistiks_id) }}"
                        class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">Kembali</a>
                </div>


            </form>


        </div>




    </div>


@endsection
