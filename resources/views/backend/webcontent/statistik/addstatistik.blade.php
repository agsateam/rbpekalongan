@extends('layouts.admin')
@section('title', 'Tambah Statistik Baru')
@section('content')

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

        <div class="flex flex-col md:flex-row justify-between">
            <h4 class="text-2xl md:text-3xl font-bold mb-5">Tambah Statistik</h4>
            <div class="breadcrumbs text-sm">
                <ul>
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li>Web Content</li>
                    <li>Statistik</li>
                </ul>
            </div>
        </div>

        <div class="">

            <form class="p-4 md:p-5" action="{{ route('webcontent.statistik.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf

                <!-- Input Jenis Statistik -->
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="mb-5">
                        <label for="jenis_statistiks_id"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Statistik</label>
                        <select id="jenis_statistiks_id" name="jenis_statistiks_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            required>
                            <option value="">Pilih Jenis Statistik</option>
                            <option value="1" {{ old('jenis_statistiks_id') == 1 ? 'selected' : '' }}>Go Digital
                            </option>
                            <option value="2" {{ old('jenis_statistiks_id') == 2 ? 'selected' : '' }}>Go Modern
                            </option>
                            <option value="3" {{ old('jenis_statistiks_id') == 3 ? 'selected' : '' }}>Go Online
                            </option>

                        </select>
                        @error('jenis_statistiks_id')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Input Tahun -->
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="mb-5">
                        <label for="tahun"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tahun</label>
                        <select id="tahun" name="tahun"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            required>
                            <option value="">Pilih Tahun</option>
                            @for ($i = date('Y'); $i >= 2017; $i--)
                                <option value="{{ $i }}" {{ old('tahun') == $i ? 'selected' : '' }}>
                                    {{ $i }}
                                </option>
                            @endfor
                        </select>
                        @error('tahun')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Input Jumlah -->
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="mb-5">
                        <label for="jumlah"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah</label>
                        <input type="number" id="jumlah"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            value="{{ old('jumlah') }}" name="jumlah" required />
                        @error('jumlah')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Tombol Simpan dan Kembali -->
                <div class="flex justify-start mt-6 gap-2">
                    <button type="submit"
                        class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Simpan
                    </button>
                    <a href="{{ route('webcontent.statistik') }}"
                        class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">
                        Kembali
                    </a>
                </div>

            </form>

        </div>

    </div>

@endsection
